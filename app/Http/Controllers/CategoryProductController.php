<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function master()
    {
        return view('backEnd.admin_master');
    }

    public function index()
    {
        $categories=Category::all();
        
        return view('backEnd.category.index' , compact('categories'));
    }

    public function create()
    {
        return view('backEnd.category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',//1
        ]);

        $category= new Category;
        $category->name= $request->name; //2 insert
        $category->save();

        return redirect()->route('admin.index')->with('success','Category insert');

    }

    public function edit(Category $category)
    {
        return view('backEnd.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('admin.index')->with('success','Category insert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.index')->with('success','Category deleted');
    }

    public function trashedc()
    {
        $categories=Category::onlyTrashed()->get();
        return view('backEnd.category.trashed' , compact('categories'));
    }

    public function backdelc($id)
    {
        $categories=Category::onlyTrashed()->where('id',$id)->restore();

        return redirect()->route('admin.index')->with('success','Category back');
    }
    public function hdeletec($id)
    {
        $categories=Category::onlyTrashed()->where('id',$id)->forceDelete();

        return redirect()->route('admin.index')->with('success','Category Deleted');
    }


}
