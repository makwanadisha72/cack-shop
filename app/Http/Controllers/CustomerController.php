<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

session_start();

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientTheme.singhin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientTheme.singhup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password']=md5($data['password']);
        session(['user' => $data['email']]);
        // $_SESSION['user'] = $data['name'];
        Customer::create($data);
        // dd($user_status);
        return view('clientTheme.home');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
    //
    }
}
