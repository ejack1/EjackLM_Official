<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();

        return view('customers.index',compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'company' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'image' => 'required',

        ]);
        $customer = new Customer();
        // if($request->hasFile('image'))
        // {
        //     $file=$request->file('image');
        //     $exe=$file->getClientOriginalExtension();
        //     $filename=time().'.'.$exe;
        //     $file->move('assets/images'.$filename);
        //     $customer->image = $filename;
        // }


        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('Images'), $imageName);

        $customer->image = $imageName;
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->city = $request->input('city');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->company = $request->input('company');

    $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
