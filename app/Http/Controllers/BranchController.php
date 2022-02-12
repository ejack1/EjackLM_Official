<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{




    function __construct()
    {
         $this->middleware('permission:branch-list|branch-create|branch-edit|branch-delete', ['only' => ['index','show']]);
         $this->middleware('permission:branch-create', ['only' => ['create','store']]);
         $this->middleware('permission:branch-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:branch-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $branches = Branch::latest()->paginate(5);
        return view('branches.index',compact('branches'));
    }
    public function create()
    {
        return view('branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'address'=>'required',
            'contact'=>'required',
        ]);

        Branch::create($request->all());
        return redirect()->route('branches.index')->with('success','Created Successfully.');
    }

    public function edit(Branch $branch)
    {
        return view('branches.edit',compact('branch'));
    }


    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'address'=>'required',
            'contact'=>'required',
        ]);

        $branch->update($request->all());
        return redirect()->route('branches.index')->with('success','Updated Successfully.');
    }


    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success','Student deleted successfully.');
    }

}
