<?php

namespace App\Http\Controllers;

use App\Models\general_setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $setting = general_setting::find(1);
        dd('hi');
        return view('layout.main',['setting' => $setting]);
    }
}
