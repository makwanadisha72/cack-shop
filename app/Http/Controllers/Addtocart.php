<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addtocart extends Controller
{
    public function index($id)
    {
        $get_id = request()->route('id');
        $user = DB::table('customers')->where('email',session('user'))->first();
    // print_r($id);
    // exit();

    $pro_id = $get_id;
    $usr_id = $user->id;

    $qry_status = DB::table('addtocart')->insert([
        ['product_id'=> $pro_id, 'user_id'=> $usr_id],
    ]);
    return view('clientTheme.cart');
    }
}
