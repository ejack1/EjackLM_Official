<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    public function index()
    {
        $designations = Designation::latest()->paginate(5);
        return view('designations.index',compact('designations'));
    }
    public function create()
    {
        return view('designations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        Designation::create($request->all());
        return redirect()->route('designations.index')->with('success','Created Successfully.');
    }

    public function edit(Designation $designation)
    {
        return view('designations.edit',compact('designation'));
    }


    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $designation->update($request->all());
        return redirect()->route('designations.index')->with('success','Updated Successfully.');
    }


    public function destroy(Designation $designation)
    {
        $designation->delete();
        return redirect()->route('designations.index')->with('success','Country deleted successfully.');
    }
}
