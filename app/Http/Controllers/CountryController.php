<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CountryController extends Controller
{
   public function index()
    {
        $countries = Country::latest()->paginate(5);
        return view('countries.index',compact('countries'));
    }
    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required',

        ]);

        Country::create($request->all());
        return redirect()->route('countries.index')->with('success','Created Successfully.');
    }

    public function edit(Country $country)
    {
        return view('countries.edit',compact('country'));
    }


    public function update(Request $request, Country $country)
    {
        $request->validate([
            'country_name' => 'required',

        ]);

        $country->update($request->all());
        return redirect()->route('countries.index')->with('success','Updated Successfully.');
    }


    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('success','Country deleted successfully.');
    }



}
