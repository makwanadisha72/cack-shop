<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ImageUpload;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_categories=SubCategory::get();
        return view('admin.subCategory.SubCategory',compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::get();
        return view('admin.subcategory.addSubCategory',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());  //see all data and stop the execution //dd=data description
        $input = $request->all();
        $request->validate([
            'name' => 'required|unique:subcategories,name',
            'description' => 'required',
            'image' => 'mimes:jpeg,bmp,png,svg,webp'
        ]);
        if(!empty($input['image'])){
            $input['image'] = ImageUpload::upload('image/subcategory',$input['image'],$request['name']);
        }//else{
        //     $input['image'] = 'picture-not-available.jpg';
        // }
        // dd($input);
        SubCategory::create($input);
        return redirect()->route('subcategory.index');
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
    public function edit(SubCategory $subcategory)
    {
        // dd($id);
        // $categories=Category::get();
        return view('admin.subcategory.editSubCategory',compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        // dd($request->all());  //see all data and stop the execution
        $input = $request->all();
        $request->validate([
            'name' => 'required|unique:subcategories,name',
            'description' => 'required|unique:categories,description',
            'image' => 'mimes:jpeg,bmp,png,svg,webp'
        ]);
        if(!empty($input['image'])){
            $input['image'] = ImageUpload::upload('image/subcategory',$input['image'],$request['name']);
        }
        // dd($input['image']);
        $subcategory->update($input);
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        unlink("image/subcategory/".$subcategory["image"]."");
        $subcategory->delete();
        return redirect()->route('subcategory.index');
    }
}
