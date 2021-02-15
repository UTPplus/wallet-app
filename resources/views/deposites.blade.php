@extends('layouts.app')

@section('content')


<div class="container">

<div class="sidenav">
  <a href="/home">My Wallet</a>
  <a href="#">Deposites</a>
  <!-- <a href="/transactions">Transactions</a>
   -->
</div>

    <div class="row justify-content-center">
        <div class="col-md-8">
        <h3>My Deposits</h3>
        <p></p>
            
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Amount</th>
      <th scope="col">Precent</th>
      <th scope="col">Accrue times</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  @foreach($trans as $tr)
    <tr>
      <th scope="row">{{$tr->id}}</th>
      <td>{{$tr->invested}}</td>
      <td>{{$tr->percent}}</td>
      <td>{{$tr->accrue_time}}</td>
      <td>{{$tr->active}}</td>
      <td>{{$tr->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


        </div>
    </div>
</div>
@endsection
