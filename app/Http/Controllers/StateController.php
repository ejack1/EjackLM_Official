<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Country;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();

        return view('states.index',compact('states'));
    }
    public function create()
    {
        $countries=Country::all();
        return view('states.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_name' => 'required',
            'country_id' => 'required',

        ]);

        State::create($request->all());
        return redirect()->route('states.index')->with('success','Created Successfully.');
    }

    public function edit(State $state)
    {
        $countries=Country::all();
        return view('states.edit',compact('state','countries'));
    }


    public function update(Request $request, State $state)
    {
        $request->validate([
            'country_name' => 'required',

        ]);

        $state->update($request->all());
        return redirect()->route('states.index')->with('success','Updated Successfully.');
    }


    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('success','Country deleted successfully.');
    }

}
