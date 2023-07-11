<?php

namespace App\Http\Controllers;

use App\Models\Order;

use App\Models\Products;

use App\Models\Category;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $product=Products::all();
        $orders=Order::all();
        return view('FrontEnd.cart',compact('orders','product'));
    }

    public function orderindex()
    {
        $product=Products::all();
        $orders=Order::all();
        return view('backEnd.orders.indexorder',compact('orders','product'));
    }

    public function store(Request $request)
    {
        if($request->quantity==0  ){
            return back();
           }
           if($request->quantity<0){
            return back();
           }

           Order::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id,
            'date'=>$request->date,
            'time'=>$request->time,
            'phone'=>$request->phone,
            'quantity'=>$request->quantity,
           ]);
           return redirect()->route('homecart.indexcart');
    }


    public function show(Order $order)
    {
        // $orders=Order::all();
        return view('backEnd.orders.orderdetial',compact('order'));

    }


    public function destroy( Order $order)
    {

        Order::where('status','completed')->delete();
        return back();
    }
    public function delete( Order $order)
    {
        $order->delete();
        return back();
    }

    public function changeStuatas(Request $request , Order $order)
    {
        $order->update([
            'status'=>$request->status
        ]);
        return back();
    }
}
