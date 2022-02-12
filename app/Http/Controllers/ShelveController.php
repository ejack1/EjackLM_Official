<?php

namespace App\Http\Controllers;

use App\Models\Shelve;
use App\Models\City;
use App\Models\Country;
use App\Models\Shelvelocation;
use Illuminate\Http\Request;

class ShelveController extends Controller
{
    public function index()
    {
        $shelves = Shelve::all();
        $cities=City::all();
        return view('shelves.index',compact('shelves','cities'));
    }
    public function create()
    {
         $countries=Country::all();
         $cities=City::all();
         $shelvelocations=Shelvelocation::all();
        return view('shelves.create',compact('countries','shelvelocations','cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'country_id' => 'required',
            'shelvelocation_id' => 'required',
            'shelveno' => 'required',
        ]);

        Shelve::create($request->all());
        return redirect()->route('shelves.index')->with('success','Created Successfully.');
    }

    public function edit(Shelve $shelve)
    {
        $countries=Country::all();
        return view('shelves.edit',compact('countries'));
    }


    public function update(Request $request, Shelve $shelve)
    {
        $request->validate([
            'city_id' => 'required',
            'country_id' => 'required',
            'shelvelocation_id' => 'required',
            'shelveno' => 'required',
        ]);


        $shelve->update($request->all());
        return redirect()->route('shelves.index')->with('success','Updated Successfully.');
    }


    public function destroy($shelve)
    {
        $ts=Shelve::find($shelve);
        $ts->delete();
        return redirect()->route('shelves.index')->with('success','Country deleted successfully.');
    }

}
