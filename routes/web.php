<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Addtocart;

Route::group(['middleware'=>'auth'],function(){
    Route::resource('admin/category',CategoryController::class);
    Route::resource('admin/subcategory',SubCategoryController::class);
    Route::resource('admin/products',ProductsController::class);
    Route::get('/admin/customers',function(){return view('admin.customers');});
    Route::get('/admin', function () {
        return view('admin.home');
    });
});

Route::get('/filter_product',function(){return view('clientTheme.filter_product');});
Route::get('/masterclient',function(){return view('clientTheme.include.master');});
Route::get('/aboutus',function(){return view('clientTheme.aboutus');});
Route::get('/addtocart/{id}', [Addtocart::class, 'index'])->name('addtocart'); // Your 'Add To Cart Product' view
Route::get('/removetocart/{id}', [Addtocart::class, 'removetocart']); // Your 'Add To Cart Product' view
Route::get('/cart',function(){return view('clientTheme.cart');});
Route::get('/checkout',function(){return view('clientTheme.checkout');})->name('chechout');
Route::get('/',function(){return view('clientTheme.home');})->name('home');
Route::get('/products',function(){return view('clientTheme.products');});
Route::get('/product',function(){return view('clientTheme.single_product');});
Route::get('/wishlist',function(){return view('clientTheme.wishlist');});
Route::get('/singhin',function(){return view('clientTheme.singhin');});

Route::get('/single_product/{id}', function ($id) {return view('clientTheme.single_product', ['id' => $id]);})->name('single_product'); // Your 'productsingle' view


Route::get('/singhup', [CustomerController::class, 'create'])->name('customer.create'); // Your 'singup Product' view
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/singhout', function () {
    // session_start();
    // session_destroy();
    session()->forget('user');
    return view('clientTheme.singhin'); // Your 'Product' view
})->name('singhout');

Route::get('/singhin', [CustomerController::class,'index'])->name('customer.index');
Route::post('/checklogin', function(Request $request){
    $password = md5($request['password']);
    $user_chk = DB::table('customers')
        ->where('email', $request['email'])
        ->where('password', $password)
        ->get(); // Use first() to get only the first matching record
    // dd($user_chk);
    if($user_chk) { 
        foreach($user_chk as $user){
            session(['user' => $user->email]); // Assuming 'name' is the field for user's name
        }
        // User found, set session and redirect
        return redirect()->route('home'); // Assuming you have a named route 'home1'
    } else {
        // User not found, redirect to login page
        return redirect()->route('customer.index'); // Assuming you have a named route 'customer.index'
    }
});

Route::resource('customer',CustomerController::class);
Route::post('/customer/create', [CustomerController::class, 'create']);


Auth::routes();