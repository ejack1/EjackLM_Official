<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\City;
use App\Models\Country;
use App\Models\Designation;

class UserController extends Controller
{
    public function index()
    {

          $users = User::latest()->paginate(5);

        return view('users.index',compact('users'));
    }
    public function create()
    {

        $countries=Country::all();

        $roles=Role::all();
        $designations=Designation::all();
        return view('users.create',compact('countries','roles','designations'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
            'city_id' => 'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'designation_id'=>'required',
            'image'=>'required',
        ]);


        $user =new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->phone=$request->input('phone');
        $user->city_id=$request->input('city_id');
        $user->country_id=$request->input('country_id');
        $user->state_id=$request->input('state_id');
        $user->designation_id=$request->input('designation_id');
        // image code
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('Mu/Images'), $imageName);

        $user->image = $imageName;
        // End image code

        $user->role_id=$request->input('role_id');
        $user->save();
        $role_r = Role::where('id', '=', $request->input('role_id'))->firstOrFail();
        $user->assignRole($role_r); //Assigning role to user

    //   return  $role=Role::where('id',$request->input('role_id'));
    $users=User::all();
    return view('users.index',compact('users'))->with('success','Created Successfully.');
    }



    public function edit(User $user)
    {

        $countries=Country::all();

        $roles=Role::all();
        $designations=Designation::all();

        return view('users.edit',['designations'=>$designations,'countries'=>$countries,'roles'=>$roles,'user'=>$user]);
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->detach();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
            'city_id' => 'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'designation_id'=>'required',
            'image'=>'required',
        ]);


        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->phone=$request->input('phone');
        $user->city_id=$request->input('city_id');
        $user->country_id=$request->input('country_id');
        $user->state_id=$request->input('state_id');
        $user->designation_id=$request->input('designation_id');

        // image code
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('Mu/Images'), $imageName);

        $user->image = $imageName;
        // End image code


        $role_r = Role::where('id', '=', $request->input('role_id'))->firstOrFail();
        $user->assignRole($role_r);
        $user->update();

        return redirect()->route('/')->with('success','Updated Successfully.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','Student deleted successfully.');
    }
}
