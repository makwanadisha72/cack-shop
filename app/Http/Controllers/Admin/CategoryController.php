<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ImageUpload;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::get();
        return view('admin.category.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());  //see all data and stop the execution
        $input = $request->all();
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'required',
            'image' => 'mimes:jpeg,bmp,png,svg,webp'
        ]);
        if(!empty($input['image'])){
            $input['image'] = ImageUpload::upload('image/category',$input['image'],$request['name']);
        }else{
            $input['image'] = 'picture-not-available.jpg';
        }
        // dd($input['image']);
        Category::create($input);
        return redirect()->route('category.index');
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
    public function edit(Category $category)
    {
        // dd("image/category/".$category["image"]."");
        // $categories=Category::get();
        return view('admin.category.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());  //see all data and stop the execution
        $input = $request->all();
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'required|unique:categories,description',
            'image' => 'mimes:jpeg,bmp,png,svg,webp'
        ]);
        if(!empty($input['image'])){
            $input['image'] = ImageUpload::upload('image/category',$input['image'],$request['name']);
        }
        // dd($input['image']);
        $category->update($input);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // dd($category);
        unlink("image/category/".$category["image"]."");
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
