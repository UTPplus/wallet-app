<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Wallet;
use App\Models\Transactions;
use App\Models\Deposite;
use App\Jobs\TransactionHandler;
use App\Models\Podcast;
use DB;

class DepositeController extends Controller 
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trans =DB::table('deposites')->where('wallet_id', $id)->get();
        //  var_dump($trans);
        // die();

        return view('deposites')->with('trans', $trans);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function depoTrans($id, $data){
       DB::transaction(function () use( $id, $data) {
        $depoiste= new Deposite();
        $trans= new Transactions();

        $i=10;
        while($i>0){
        $wallet = Wallet::find($id);
        $trans->type = 'Deposite';
        $trans->user_id = $wallet->user_id;
        $trans->wallet_id = $id;
        $trans->deposite_id= $depoiste->id;
        $trans->amount = $data*0.2;
        $trans->save();
        $d= $data*0.2;
        $wallet->balance = $wallet->balance + $d;
        // var_dump($wallet);
        // die();
        $wallet->save();
        sleep(1);
        $i++;
        }
        $depoiste->active= 'closed';
        $depoiste->save();
        
           DB::commit();
       });
       

    }
    
    public function edit($id)
    {  
        $data = request()->all();
        $depoiste= new Deposite();
        
        $wallet = Wallet::find($id);
        $wallet->balance = $wallet->balance - $data['amount'];
        $wallet->save();

        $depoiste->user_id= $wallet->user_id;
        $depoiste->wallet_id= $id;
        $depoiste->invested= $data['amount'];
        $depoiste->percent= 20;
        $depoiste->active= 'open';
        $depoiste->duration = 10;
        $depoiste->accrue_time = 10;
        $depoiste->save();
        //$amount = $data['amount'];
        //$this->depoTrans($id, $amount);
        

        
        //TransactionHandler::dispatch();
        
        return redirect('home');
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
