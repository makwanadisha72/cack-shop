<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\ImageUpload;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Products::get();
        return view('admin.products.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories=SubCategory::get();
        return view('admin.products.addproducts',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $conn=mysqli_connect("localhost","root","","cackshop");
        $qry1="SELECT `cat_name` FROM `subcategories` WHERE `name`= '".$request['subcat_name']."'";
        $res = mysqli_query($conn,$qry1);
        $qry2 = mysqli_fetch_row($res);
        // echo $qry2[0];
        // exit(); 
        // dd($request->all());  //see all data and stop the execution
        $input = $request->all();
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'required',
            'image' => 'mimes:jpeg,bmp,png,svg,webp'
        ]);
        if(!empty($input['image'])){
            $input['image'] = ImageUpload::upload('image/products',$input['image'],$request['name']);
        }else{
            $input['image'] = 'picture-not-available.jpg';
        }
        $input['cat_name'] = $qry2[0] ;
        // dd($input);
        Products::create($input);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        // dd($products);
        // $products=Products::get();
        $subcategories=SubCategory::get();
        return view('admin.products.editproducts',compact('product','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $conn=mysqli_connect("localhost","root","","cackshop");
        $qry1="SELECT `cat_name` FROM `subcategories` WHERE `name`= '".$request['subcat_name']."'";
        $res = mysqli_query($conn,$qry1);
        $qry2 = mysqli_fetch_row($res);
        // echo $qry2[0];
        // exit();
        // dd($request->all());  //see all data and stop the execution
        $input = $request->all();
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'required|unique:categories,description',
            'image' => 'mimes:jpeg,bmp,png,svg,webp'
        ]);
        if(!empty($input['image'])){
            $input['image'] = ImageUpload::upload('image/products',$input['image'],$request['name']);
        }
        $input['cat_name'] = $qry2[0] ;
        // dd($input);
        $product->update($input);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        // dd($products);
        unlink("image/products/".$product["image"]."");
        $product->delete();
        return redirect()->route('products.index');
    }
}
