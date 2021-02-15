<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Console\Scheduling\Schedule;
use App\Models\Wallet;
use App\Models\Transactions;
use App\Models\Deposite;

class TransactionHandler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $deposits = Deposite::where('active','=','open')->get();

       foreach($deposits as $deposit){

            $wallet = Wallet::find($deposit->user_id);
            $trans = new Transactions();
            $trans->user_id = $deposit->user_id;
            $trans->wallet_id = $deposit->wallet_id;
            $trans->deposite_id = $deposit->id;
            $trans->amount = $deposit->invested*0.2;
            $trans->type = 'deposit precent';
            $trans->save();

            $wallet->balance +=$trans->amount;
            $wallet->save();
            $deposit->accrue_time--;
            if ($deposit->accrue_time == 0) {
                    $deposit->active = 'close';
                }
            $deposit->save();
        }
    }
}
