<?php

namespace App\Http\Controllers;

use App\Models\Shelvelocation;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;

class ShelvelocationController extends Controller
{
    public function index()
    {
        $shelvelocations = Shelvelocation::all();
        $cities=City::all();
        return view('shelvelocations.index',compact('shelvelocations','cities'));
    }
    public function create()
    {
         $countries=Country::all();

        return view('shelvelocations.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'country_id' => 'required',
            'warehouse' => 'required',

        ]);

        Shelvelocation::create($request->all());
        return redirect()->route('shelvelocations.index')->with('success','Created Successfully.');
    }

    public function edit(Shelvelocation $shelvelocation)
    {
        $countries=Country::all();
        return view('shelvelocations.edit',compact('state','countries'));
    }


    public function update(Request $request, Shelvelocation $shelvelocation)
    {
        $request->validate([
            'city_id' => 'required',
            'country_id' => 'required',
            'warehouse' => 'required',

        ]);

        $shelvelocation->update($request->all());
        return redirect()->route('shelvelocations.index')->with('success','Updated Successfully.');
    }


    public function destroy(Shelvelocation $shelvelocation)
    {
        $shelvelocation->delete();
        return redirect()->route('shelvelocations.index')->with('success','Country deleted successfully.');
    }

}
