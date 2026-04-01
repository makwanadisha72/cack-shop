<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addtocart extends Controller
{
    public function index($id)
{
    $user = DB::table('customers')->where('email', session('user'))->first();
    if (!$user) {
        return redirect('/login');
    }
    $exists = DB::table('addtocart')->where('user_id', $user->id)->where('product_id', $id)->exists();
    if (!$exists) {
        DB::table('addtocart')->insert([ 'product_id' => $id,'user_id'    => $user->id,]);
    }
    return redirect('/cart'); 
}
    public function removetocart($id)
    {
        DB::table('addtocart')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Item removed');
    }
}
