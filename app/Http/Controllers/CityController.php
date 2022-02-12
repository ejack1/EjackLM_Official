<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {

        $cities = City::all();
        return view('cities.index',compact('cities'));
    }
    public function create()
    {
        $states=State::all();
        $countries=Country::all();
        return view('cities.create',compact('states','countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required',
            'name'=>'required',
            'smsacity'=>'required',
            'title'=>'required',
            'desc'=>'required',
            'keywords'=>'required',
            'country_id'=>'required',
        ]);

        $city=new City();
        $city->state_id=$request->input('state_id');
        $city->country_id=$request->input('country_id');
        $city->name=$request->input('name');
        $city->smsacity=$request->input('smsacity');
        $city->title=$request->input('title');
        $city->desc=$request->input('desc');
        $city->keywords=$request->input('keywords');


        $city->city_code='CIT'.rand(23,55);
        $city->save();
        return redirect()->route('cities.index')->with('success','Created Successfully.');
    }
    public function edit(City $city)
    {   $states=State::all();
        $countries=Country::all();
        return view('cities.edit',compact('city','states','countries'));
    }


    public function update(Request $request, City $city)
    {
        $request->validate([
            'state_id' => 'required',
            'name'=>'required',
            'smsacity'=>'required',
            'title'=>'required',
            'desc'=>'required',
            'keywords'=>'required',
            'country_id'=>'required',
        ]);
        $city->state_id=$request->input('state_id');
        $city->state_id=$request->input('country_id');
        $city->name=$request->input('name');
        $city->smsacity=$request->input('smsacity');
        $city->title=$request->input('title');
        $city->desc=$request->input('desc');
        $city->keywords=$request->input('keywords');


        $city->city_code='CIT'.rand(23,55);

        $city->update();
        return redirect()->route('cities.index')->with('success','Updated Successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success','Student deleted successfully.');
    }


}
