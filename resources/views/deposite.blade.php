@extends('layouts.app')

@section('content')


<div class="container">

<div class="sidenav">
  <a href="/home">My Wallet</a>
  <a href="#">Make Deposite</a>
  <!-- <a href="/deposites">Deposites</a>
  <a href="/transactions">Transactions</a>
   -->
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


                    <form action="create" method="POST" >
                      @csrf
                     
                    
                    <input type="integer" class="form-control" id="amount" name="amount"  placeholder="Enter deposite amount">
                    <input type="hidden" name="id" value="{{$id}}">
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
