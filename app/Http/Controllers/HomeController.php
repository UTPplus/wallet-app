<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$id=Auth::id();
        // var_dump($id);
        // die();          

        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id=Auth::id();
        $wallet = Wallet::where('user_id', '=', $id)->firstOrFail();
        // var_dump($wallet->balance);
        // die();
        return view('home')->with('wallet', $wallet);
       // return view('home')->with(['data'=>$data]);
    }
}
