@extends('layouts.app')

@section('content')


<div class="container">

<div class="sidenav">
  <a href="/home">My Wallet</a>
  <a href="#">Deposites</a>
  <a href="/transactions">Transactions</a>
  
</div>

    <div class="row justify-content-center">
        <div class="col-md-8">
        <h3>My Transactions</h3>
        <p></p>
            
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Type</th>
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
      <th scope="col">Wallet_id</th>
    </tr>
  </thead>
  <tbody>
  @foreach($trans as $tr)
    <tr>
      <th scope="row">{{$tr->id}}</th>
      <td>{{$tr->type}}</td>
      <td>{{$tr->amount}}</td>
      <td>{{$tr->created_at}}</td>
      <td>{{$tr->wallet_id}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


        </div>
    </div>
</div>
@endsection
