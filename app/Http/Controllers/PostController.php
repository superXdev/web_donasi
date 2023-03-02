<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\{Post, Category};
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->with('category')->orderBy('created_at', 'desc')->latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $categories = Category::with('posts')->get();
        $posts = Post::where('slug', '!=', $post->slug)->orderBy('created_at', 'desc')->limit(5)->get();
        // dd($posts);
        return view('blog.show', compact('post', 'posts', 'categories'));
    }

    public function search(Request $request)
    {
        $request->validate(['keyword' => 'required|string']);

        $keyword = $request->keyword;

        $categories = Category::all();
        $posts = Post::where('title', 'like', '%'.$keyword.'%')->latest()->paginate(10);

        return view('blog.search', compact('keyword', 'categories', 'posts'));
    }

    public function author($author)
    {
        $categories = Category::all();
        $posts = Post::where('author', $author)->latest()->paginate(10);
        
        return view('blog.author', compact('author', 'categories', 'posts'));
    }

    public function category(Category $category)
    {
        $category_name = $category->name;
        $categories = Category::all();
        $posts = $category->posts;
        
        return view('blog.category', compact('category_name', 'categories', 'posts'));
    }

    public function category_save(Request $request)
    {
        $isExists = Category::where('name', $request->name)->exists();
        if(!$request->name || $isExists) {
            return response()->json(['status' => 'failed']);
        }

        $result = Category::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name)
        ]);

        return response()->json(['status' => 'success', 'id' => $result->id]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail'  => 'required|file|image|mimes:jpg,png,svg',
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'author' => 'required'
        ]);

        $data = $request->all();

        $isExists = Post::where('slug', \Str::slug($request->title))->exists();

        $data['slug'] = ($isExists) ? \Str::slug($request->title.'-'.substr(md5(time()), 0, 8)) : \Str::slug($request->title);

        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');

            $fileName = $file->getClientOriginalName();
            $folder = Carbon::now()->format('m-d-Y');

            $file->storeAs('posts/'.$folder, $fileName, 'public');

            $data['thumbnail'] = 'posts/'.$folder.'/'.$fileName;
        }


        Post::create($data);

        return redirect()->to(route('admin.dashboard'))->with('success', 'Artikel berhasil disimpan!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'author' => 'required'
        ]);

        $data = $request->all();

        $data['slug'] = \Str::slug($request->title.'-'.now());

        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');

            $fileName = $file->getClientOriginalName();
            $folder = Carbon::now()->format('m-d-Y');

            $file->storeAs('posts/'.$folder, $fileName, 'public');

            $data['thumbnail'] = 'posts/'.$folder.'/'.$fileName;
        } else {
            $data['thumbnail'] = $post->thumbnail;
        }

        $post->update($data);

        return redirect()->to(route('admin.dashboard'))->with('success', 'Artikel berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('admin.dashboard'))->with('success', 'Artikel berhasil dihapus!');
    }
}
