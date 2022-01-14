<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\http\Request;

class ApiController extends Controller
{
    public function index(){

        $data = customer::all();

        return response()->json([
        'sucess' =>true,
        'message' => 'list Data Costomer',
        'data' => $data
        ],200);
    }
    public function create(){
    //
    }

    public function store(Request $request){

        $request->validate([
            'nama' => 'required',
            'email_customer' => 'required',
            'alamat' => 'required',
            'no_telep' => 'required',
            'kelamin' => 'required',
        ]);

        $customer = new Customer;
        $customer->nama = $request->nama;
        $customer->email_customer = $request->email;
        $customer->alamat = $request->alamat;
        $customer->no_telp = $request->no_telp;
        $customer->kelamin = $request->kelamin;
        $customer->save();

        return response()->json([
        'sucess' =>true,
        'message' => 'list Data Costomer',
        'data' => $customer,
        ],200);
  }


  public function show($id){

    $data = customer::find($id);

        return response()->json([
        'sucess' =>true,
        'message' => 'list Data Costomer',
        'data' => $data
        ],200);
  }


  public function edit($id)
{
    //
}

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->nama = $request->nama;
        $customer->email_customer = $request->email;
        $customer->alamat = $request->alamat;
        $customer->no_telp = $request->no_telp;
        $customer->kelamin = $request->kelamin;
        $customer->save();

        retrun response()->jason([
            'success' => true,
            'masege' => 'List Ubah Data  Customer',
            'data' => $customer
        ],200);
    }
}
