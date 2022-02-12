<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{


    public function index()
    {
        $routes = Route::latest()->paginate(5);
        return view('routes.index',compact('routes'));
    }
    public function create()
    {
        $cities=City::all();
        $countries=Country::all();
        return view('routes.create',compact('cities','countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'routename' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'keywords'=>'required',
        ]);

        //Route::create($request->all());
        $route=new Route();
        $route->routename=$request->input('routename');
        $route->country_id=$request->input('country_id');
        $route->city_id=$request->input('city_id');
        $route->keywords=$request->input('keywords');
        $route->routecode='RAD'.rand(23,55);
        $route->save();

        return redirect()->route('routes.index')->with('success','Created Successfully.');
    }

    public function edit(Route $route)
    {
        return view('routes.edit',compact('route'));
    }


    public function update(Request $request, Route $route)
    {
        $request->validate([
            'routename' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'keywords'=>'required',
        ]);
        $route->routename=$request->input('routename');
        $route->country_id=$request->input('country_id');
        $route->city_id=$request->input('city_id');
        $route->keywords=$request->input('keywords');
        $route->routecode='RAD'.rand(23,55);
        $route->update();

        return redirect()->route('routes.index')->with('success','Updated Successfully.');
    }


    public function destroy(Route $route)
    {
        $route->delete();
        return redirect()->route('routes.index')->with('success','Student deleted successfully.');
    }
}
