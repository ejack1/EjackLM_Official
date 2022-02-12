<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Country;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        $couriers = Courier::all();
        return view('couriers.index',compact('couriers'));
    }
    public function create()
    {
        $countries=Country::all();
        return view('couriers.create',compact('countries'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'country_id'=>'required',

            'mobile'=>'required',
            'email'=>'required',
            'iqamanumber'=>'required',
            'iqamafile'=>'required',
            'license'=>'required',
            'vehicle'=>'required',
            'color'=>'required',
            'supplier'=>'required',
            'password'=>'required',
            'vehiclenumber'=>'required',
           'image'=>'required',
            'joindate'=>'required',
        ]);

      //Courier::create($request->all());

        $courier=new Courier();
        $courier->name=$request->input('name');
        $courier->country_id=$request->input('country_id');
        $courier->mobile=$request->input('mobile');
        $courier->email=$request->input('email');
        $courier->iqamanumber=$request->input('iqamanumber');
        $courier->vehicle=$request->input('vehicle');
        $courier->color=$request->input('color');
        $courier->supplier=$request->input('supplier');
        $courier->password=$request->input('password');
        $courier->vehiclenumber=$request->input('vehiclenumber');
        $courier->joindate=$request->input('joindate');
        $courier->code='COU'.rand(1,1000);
        //saving iqamafile
        $iqamafileName = time().'.'.$request->iqamafile->extension();
        $request->iqamafile->move(public_path('Iqmas'), $iqamafileName);
        $courier->iqamafile = $iqamafileName;
        //

      //saving iqamafile
      $licenseName = time().'.'.$request->license->extension();
      $request->license->move(public_path('license'), $iqamafileName);
      $courier->license = $licenseName;
      //

      //saving iqamafile
      $imageName = time().'.'.$request->image->extension();
      $request->image->move(public_path('Courierimages'), $imageName);
      $courier->image = $licenseName;
      //
      $courier->save();

        return redirect()->route('couriers.index')->with('success','Created Successfully.');
    }

    public function edit(Courier $courier)
    {
        $countries=Country::all();
        return view('couriers.edit',compact('courier','countries'));
    }


    public function update(Request $request, Courier $Courier)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'address'=>'required',
            'contact'=>'required',
        ]);

        $Courier->update($request->all());
        return redirect()->route('couriers.index')->with('success','Updated Successfully.');
    }


    public function destroy(Courier $Courier)
    {
        $Courier->delete();
        return redirect()->route('couriers.index')->with('success','Student deleted successfully.');
    }
}
