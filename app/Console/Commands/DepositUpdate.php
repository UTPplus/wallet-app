<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Wallet;
use App\Models\Transactions;
use App\Models\Deposite;
use Illuminate\Support\Facades\DB;

class DepositUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:percent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
                     $deposit->active = 'closed';
                 }
             $deposit->save();
         }
    }
}
