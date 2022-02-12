<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::latest()->paginate(5);
        return view('zones.index',compact('zones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        Zone::create($request->all());
        return redirect()->route('zones.index')->with('success','Created Successfully.');
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
        return redirect()->route('zones.index')->with('success','Country deleted successfully.');
    }

    public function addcityzone(){


        $zones=Zone::all();
        $cities=City::all();
        return view('zones.setcityzone',compact('zones','cities'));
    }
    public function addcountryzone(){


        $zones=Zone::all();
        $countries=Country::all();
        return view('zones.setcountryzone',compact('zones','countries'));
    }

}
