<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\{Campaign, Category, Donation};
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(Campaign $campaign)
    {
        $campaigns = $campaign->with('donations')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.campaign.index', compact('campaigns'));
    }

    public function show(Campaign $campaign)
    {
        $categories = Category::with('posts')->get();
        $campaigns = Campaign::where('slug', '!=', $campaign->slug)
            ->orderBy('created_at', 'desc')
            ->latest()
            ->limit(5)
            ->get();
        $donations = Donation::whereHas('campaign', function($query) use ($campaign) {
            return $query
                ->where('campaign_id', $campaign->id)
                ->where('status', 'PAID');
        });

        // dd($donations->count())

        return view('campaign.show', compact('campaign', 'campaigns', 'categories', 'donations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail'  => 'required|file|image|mimes:jpg,jpeg,png,svg|max:1024',
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
            'goals' => 'required|numeric',
            'deadline' => 'required'
        ]);

        $data = $request->all();

        $isExists = Campaign::where('slug', \Str::slug($request->title))->exists();

        $data['slug'] = ($isExists) ? \Str::slug($request->title.'-'.substr(md5(time()), 0, 8)) : \Str::slug($request->title);

        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');

            $fileName = $file->getClientOriginalName();
            $folder = Carbon::now()->format('m-d-Y');

            $file->storeAs('campaigns/'.$folder, $fileName, 'public');

            $data['thumbnail'] = 'campaigns/'.$folder.'/'.$fileName;
        }

        $data['raised'] = 0;
        Campaign::create($data);

        return redirect()->to(route('admin.campaign.index'))->with('success', 'Penggalangan berhasil disimpan!');
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaign.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'thumbnail'  => 'nullable|file|image|mimes:jpg,png,svg|max:1024',
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
            'goals' => 'required|numeric',
            'deadline' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');

            $fileName = $file->getClientOriginalName();
            $folder = Carbon::now()->format('m-d-Y');

            $file->storeAs('campaigns/'.$folder, $fileName, 'public');

            $data['thumbnail'] = 'campaigns/'.$folder.'/'.$fileName;
        }

        $campaign->update($data);

        return redirect()->to(route('admin.campaign.index'))->with('success', 'Penggalangan berhasil diperbarui');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        Donation::where('campaign_id', $campaign->id)->delete();


        return back()->with('success', 'Penggalangan berhasil dihapus');
    }

    public function donatur(Request $request)
    {
        $donations = Donation::select('campaign_id', 'name', 'amount', 'created_at')
            ->whereHas('campaign', function($query) use ($request) {
                return $query
                    ->where('campaign_id', $request->all()['id'])
                    ->where('status', 'PAID');
            });

        return $donations->orderBy('created_at', 'desc')->get();
    }
}
