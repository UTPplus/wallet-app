@extends('layouts.app')

@section('content')


<div class="container">

<div class="sidenav">
  <a href="home">My Wallet</a>

  <a href="deposites/{{$wallet->id}}">Deposites</a>
  <a href="transactions/{{$wallet->id}}">Transactions</a>
  
</div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>My Wallet</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="transactionWallet/{{$wallet->id}}" method="POST" >
                      @csrf
                    <h3>My Balance : {{$wallet->balance}}$</h3> <br>
                    
                    <input type="integer" class="form-control" id="amount" name="amount"  placeholder="Enter amount">
                    <input type="hidden" name="id" value="{{ $wallet->id}}">
                    <p></p>

                    <button type="submit" class="btn btn-info">Add money</button>
                    <?php
                    // $id = Auth::id()
                    // $wallet = Wallet::find($id);
                    //  var_dump($wallet);
                    //  die();
                    
                    ?>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>My Investment</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="transaction/{{$wallet->id}}" method="POST" >
                      @csrf
                     
                    
                    <input type="integer" class="form-control" id="amount" name="amount"  placeholder="Enter deposite amount">
                    <input type="hidden" name="id" value="{{$wallet->id}}">
                    <p></p>

                    <button type="submit" class="btn btn-info">Make deposite</button>
                    <?php
                    // $id = Auth::id()
                    // $wallet = Wallet::find($id);
                    //  var_dump($wallet);
                    //  die();
                    
                    ?>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
