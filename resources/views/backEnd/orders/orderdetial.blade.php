@extends('backEnd.admin_master')

@section('content')
<h2 class=" mb-4 text-bold">Order Invoice</h2>
<section class="container">
    <div class="row">
<div class="col-md-6">
<div class="card" style="width: 18rem;">
    <div class="card-header bg-light  text-bold">
      User
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item text-bold">User  :  <span class="text-primary">{{$order->user->name}}</span> </li>
      <li class="list-group-item text-bold">User Email:  <span class="text-primary">{{$order->user->email}}</span></li>
      <li class="list-group-item text-bold">User Phone:  <span class="text-primary">{{$order->phone}}</span></li>
      <li class="list-group-item text-bold">Order Date:  <span class="text-primary">{{$order->date}}</span></li>
      <li class="list-group-item text-bold">Order Time:  <span class="text-primary">{{$order->time}}</span></li>
    </ul>
  </div>
    </div>

  <div class="col-md-6">
    <div class="card" style="width: 18rem;">
        <div class="card-header bg-light text-bold">
          Product
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-bold"> Product name:  <span class="text-primary">{{$order->product->name}}</span> </li>
          <li class="list-group-item text-bold">Quantity:  <span class="text-primary">{{$order->quantity}}</span> </li>
          <li class="list-group-item text-bold">Total:  <span class="text-primary">${{($order->quantity*$order->product->price)}}</span> </li>
          <li class="list-group-item text-bold">Order Status:  <span class="btn btn-success">{{$order->status}}</span> </li>
        </ul>
    </div>
    </div>


    </div>



</section>


@endsection
