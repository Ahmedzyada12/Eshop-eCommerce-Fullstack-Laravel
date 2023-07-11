@extends('backEnd.admin_master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card mt-4 ">
                <div class="card-header bg-light text-dark text-center">
                    <h4>Orders</h4>
                </div> <!-- card-header -->

                  <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                @if (count($orders)>0)
                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr class="bg-light text-dark">


                                <th class="text-dark"> User  </th>
                                <th class="text-dark"> name </th>
                                <th class="text-dark"> quantity</th>
                                <th class="text-dark"> Total </th>
                                <th class="text-dark"> Status </th>
                                <th class="text-dark"> Accept </th>
                                <th class="text-dark"> Completed </th>
                                <th class="text-dark"> details  </th>
                            </tr>
                        </thead>

                        <tbody>
                           @foreach ($orders  as $order)

                           <tr>
                               <td>  {{ $order->user->name }}  </td>
                               <td> {{ $order->product->name}} </td>
                               <td> {{ $order->quantity }} </td>
                               <td> $
                                {{$order->product->price*$order->quantity}}
                                </td>
                               <td> {{ $order->status }} </td>
                               <form action="{{ route('adminorder.changeStuatas', $order->id) }}" method="POST">
                                @csrf
                                <td> <input type="submit" name="status" value="accepted" class="btn btn-outline-dark" > </td>
                                <td> <input type="submit" name="status" value="completed" class="btn btn-outline-secondary"> </td>
                               </form>
                               <td><a href="{{ route('adminorder.orderdetail', $order->id) }} "  class="btn btn-outline-primary">details </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h1 class="text-center">No Orders</h1>
                   @endif

                </div><!--  card-body -->


                  {{--  <div class="card-footer">

                </div><!--  card-footer -->  --}}

            </div> <!-- card -->
                    <form action="{{ route('adminorder.delete') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <td><button type="submit" class="btn btn-outline-secondary mt-3">Delete</button></td>
                    </form>
        </div> <!-- col-9 -->
    </div> <!-- row -->
</div> <!--  container -->
@endsection
