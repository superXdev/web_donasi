<?php

namespace App\Console\Commands;

use App\Models\Donation;
use Xendit\Xendit;
use Xendit\Invoice;
use Illuminate\Console\Command;

class PaymentCheckerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process to check payment status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Xendit::setApiKey(env('XENDIT_SECRET_KEY'));

        $this->warn('Memulai pengecekan status pembayaran');
        $this->newLine();

        while(true) {
            $donations = Donation::where('status', 'PENDING')->get();

            foreach($donations as $donation) {
                $invoice = Invoice::retrieve($donation->payment_id);

                if($invoice['status'] == "SETTLED" || $invoice['status'] == "PAID") {
                    $donation->update([
                        'status' => $invoice['status'],
                        'payment_method' => $invoice['payment_channel']
                    ]);
                    $donation->campaign->increment('raised', $donation->amount);
                    $this->info('Pembayaran donasi dikonfirmasi');
                    $this->line(' - ID: '.$donation->id);
                    $this->line(' - Nominal: '.$donation->amount);
                    $this->line(' - Via: '.$invoice['payment_channel']);
                }
            }
            sleep(10);
        }
    }
}
