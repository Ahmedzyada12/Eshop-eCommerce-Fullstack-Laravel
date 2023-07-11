<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Order;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Products::all();
        return view('backEnd.products.index',compact('products'));

    }

    public function create()
    {
        $categories=Category::all();

        return view('backEnd.products.create',compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $path=$request->image->store('public/products');
        Products::create([
            'name' => $request->name ,
            'description' =>  $request->description ,
            'price' =>  $request->price ,
            'category_id' =>  $request->category_id ,
            'image' => $path ,
        ]);
        return redirect()->route('adminprod.index')->with('success','Post insert');

    }

    public function show(Products $products)
    {
        //
    }
    public function edit(Products $product)
    {
        $categories=Category::all();
        return view('backEnd.products.edite',compact('product','categories'));
    }

    public function update(ProductRequest $request, Products $product)
    {

        if($request->has('image')){
            $path = $request->image->store('public/meals');
        }else{
            $path = $product->image;
        }
            $product->name = $request->name ;
            $product->description  =  $request->description ;
            $product->price  =  $request->price ;
            $product->category_id  =  $request->category_id ;
            $product->image  = $path ;
            $product->save();

        return redirect()->route('adminprod.index')->with('message','Product Update');
    }

    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('adminprod.index')->with('message','Product Deleted');
    }
}
