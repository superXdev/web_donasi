<?php

namespace App\Http\Controllers;

use App\Models\{Donation, Campaign};
use Xendit\Xendit;
use Xendit\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with('campaign')
            ->where('status', 'PAID')
            ->latest()
            ->paginate(10);


        return view('admin.donation.index', compact('donations'));
    }

    public function store(Request $request, Campaign $campaign)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'address' => 'required|string',
            'amount' => 'required|numeric',
            'phone' => 'required|string',
            'email' => 'required|email'
        ]);

        $donation = Donation::create([
            'name' => $request->name,
            'address' => $request->address,
            'amount' => $request->amount,
            'phone' => $request->phone,
            'campaign_id' => $campaign->id
        ]);

        Xendit::setApiKey(env('XENDIT_SECRET_KEY'));

        $params = [
            'external_id' => 'donasi-'.$donation->id,
            'description' => 'Donasi '.$campaign->title,
            'amount' => (int)$request->amount,
            'success_redirect_url' => route('donation.success', $donation->id)
        ];

        $invoice = Invoice::create($params);

        $donation->update([
            'status' => $invoice['status'],
            'payment_id' => $invoice['id']
        ]);

        Cache::put('emailDonation', $request->email, now()->addMinutes(10));

        return redirect()->to($invoice['invoice_url']);
    }

    public function success(Donation $donation)
    {
        if($donation->payment_method) {
            return view('success', compact('donation'));
        }

        Xendit::setApiKey(env('XENDIT_SECRET_KEY'));

        $payment_id = $donation->payment_id;
        $invoice = Invoice::retrieve($donation->payment_id);

        if($invoice['status'] == "SETTLED" || $invoice['status'] == "PAID") {
            $donation->update([
                'status' => 'PAID',
                'payment_method' => $invoice['payment_channel']
            ]);

            $donation->campaign->increment('raised', $donation->amount);

            $this->composeEmail([
                'email' => Cache::get('emailDonation'),
                'name' => $donation->name,
                'subject' => 'Donasi kamu telah diterima',
                'message' => '<h3>Terima kasih!</h3><br>Donasi kamu sebesar Rp.'.number_format($donation->amount, 0, '.',',').' untuk penggalangan <b>'.$donation->campaign->title.'</b> telah kami terima.'
            ]);

            return view('success', compact('donation'));
        } else {
            return redirect()->route('index');
        }
    }
}
