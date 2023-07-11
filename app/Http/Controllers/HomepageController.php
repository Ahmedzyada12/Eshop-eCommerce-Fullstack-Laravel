<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Category;
use App\Models\Order;

class HomepageController extends Controller
{

    public function index(Request $request)
    {
        if(!$request->category_id){
           $products=Products::latest()->get();
           $categories=Category::all();
        return view('FrontEnd.homepage', compact('products','categories'));
        }
        else{
             $categories=Category::all();
             $products=Products::where('category_id', $request->category_id)->get();
             return view('FrontEnd.homepage', compact('products','categories'));
        }

    }
    
    public function show(Products $product)
    {
        $categories=Category::all();
        return view('FrontEnd.details', compact('product','categories'));
    }

    public function order(Products $product)
    {
        $orders=Order::all();
        return view('FrontEnd.order', compact('product','orders') );
    }


}
