<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {

          $suppliers = Supplier::latest()->paginate(5);

        return view('suppliers.index',compact('suppliers'));
    }
    public function create()
    {

        $countries=Country::all();
        return view('suppliers.create',compact('countries'));
    }

    public function store(Request $request)
    {


        $request->validate([
       'name'=>'required',
        'rate'=>'required',
        'phone'=>'required',
        'contactdate'=>'required',
        'country_id'=>'required',
        'state_id'=>'required',
        'city_id'=>'required',
        'vatno'=>'required',
        'crfile'=>'required',
        'Idfile'=>'required',
        'contractfile'=>'required',
        ]);


        $supplier =new Supplier();
        $supplier->name=$request->input('name');
        $supplier->rate=$request->input('rate');
        $supplier->phone=$request->input('phone');
        $supplier->city_id=$request->input('city_id');
        $supplier->country_id=$request->input('country_id');
        $supplier->state_id=$request->input('state_id');
        $supplier->contactdate=$request->input('contactdate');
        $supplier->vatno=$request->input('vatno');
        // cr file image code
        $crfileName = time().'.'.$request->crfile->extension();

        $request->crfile->move(public_path('CR/Images'), $crfileName);

        $supplier->crfile = $crfileName;
        // End image code

        // cr file image code
            $IdfileName = time().'.'.$request->Idfile->extension();

            $request->Idfile->move(public_path('MID/Images'), $IdfileName);

            $supplier->Idfile = $IdfileName;
            // End image code

          // image code
          $contractfileName = time().'.'.$request->contractfile->extension();

          $request->contractfile->move(public_path('Mcontract/Images'), $contractfileName);

          $supplier->contractfile = $contractfileName;
          // End image code
          $supplier->save();

          $suppliers=Supplier::all();
    return view('suppliers.index',compact('suppliers'))->with('success','Created Successfully.');
    }



    public function edit(Supplier $supplier)
    {

        $countries=Country::all();


        return view('suppliers.edit',['countries'=>$countries,'supplier'=>$supplier]);
    }

    public function update(Request $request, Supplier $supplier)
    {

        $request->validate([
            'name'=>'required',
             'rate'=>'required',
             'phone'=>'required',
             'contactdate'=>'required',
             'country_id'=>'required',
             'state_id'=>'required',
             'city_id'=>'required',
             'vatno'=>'required',
             'crfile'=>'required',
             'Idfile'=>'required',
             'contractfile'=>'required',
             ]);


             $supplier->name=$request->input('name');
             $supplier->rate=$request->input('rate');
             $supplier->phone=$request->input('phone');
             $supplier->city_id=$request->input('city_id');
             $supplier->country_id=$request->input('country_id');
             $supplier->state_id=$request->input('state_id');
             $supplier->contactdate=$request->input('contactdate');
         $supplier->vatno=$request->input('vatno');
             // cr file image code

                 $crfileName = time().'.'.$request->crfile->extension();

             $request->crfile->move(public_path('CR/Images'), $crfileName);

             $supplier->crfile = $crfileName;
             // End image code

             // cr file image code
                 $IdfileName = time().'.'.$request->Idfile->extension();

                 $request->Idfile->move(public_path('MID/Images'), $IdfileName);

                 $supplier->Idfile = $IdfileName;
                 // End image code

               // image code
               $contractfileName = time().'.'.$request->contractfile->extension();

               $request->contractfile->move(public_path('Mcontract/Images'), $contractfileName);

               $supplier->contractfile = $contractfileName;
               // End image code
               $supplier->update();

               $suppliers=Supplier::all();

        return redirect()->route('users.index')->with('success','Updated Successfully.');
    }


    public function destroy(Supplier $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','Student deleted successfully.');
    }
}
