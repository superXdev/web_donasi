<?php

namespace App\Http\Controllers;

use App\Models\{Contact, Reply};
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        if(request('filter') !== 'all') {
            $contacts = Contact::where('status', request('filter'))->latest()->limit(10)->get();
        }

        if(request('filter') === 'all' || request('filter') === null) {
            $contacts = Contact::latest()->limit(10)->get();
        }

        return view('admin.contact.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:20,min:5',
            'message' => 'required|string',
            'name' => 'required|string|max:40',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $data = $request->all();
        $data['status'] = 0;

        Contact::create($data);

        $this->composeEmail([
            'email' => 'darulirfan20@gmail.com',
            'name' => 'me',
            'subject' => $request->subject,
            'message' => 'Pengirim: <b>'.$request->name.'</b><br><br>'.nl2br($request->message)
        ]);

        return 'success';
    }

    public function show(Contact $contact)
    {
        if($contact->status == 0) {
            $contact->update(['status' => 1]);
        }

        return view('admin.contact.show', compact('contact'));
    }

    public function reply(Request $request, Contact $contact)
    {
        $request->validate(['message' => 'required|string']);

        $response = $this->composeEmail([
            'email' => $contact->email,
            'name' => $contact->name,
            'subject' => "Balasan: ".$contact->subject,
            'message' => "<div style='border: 1px solid gray; padding: 10px; margin-bottom: 10px;'>".nl2br($contact->message)."</div>".nl2br($request->message)
        ]);

        if(!$response) {
            return back()->with('failed', 'Terjadi kesalahan!');
        }

        Reply::create([
            'message' => $request->message,
            'contact_id' => $contact->id
        ]);

        $contact->update(['status' => 2]);

        return back()->with('success', 'Pesan telah dikirim!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect(route('admin.contact.index'))->with('success', 'Pesan berhasil dihapus');
    }

    public function bulkDelete(Request $request)
    {
        $contacts = Contact::whereIn('id', $request->id)->delete();

        if($contacts > 0) {
            return redirect(route('admin.contact.index'))->with('success', "$contacts pesan berhasil dihapus!");
        }

        return redirect(route('admin.contact.index'))->with('failed', "Gagal menghapus pesan");
    }
}
