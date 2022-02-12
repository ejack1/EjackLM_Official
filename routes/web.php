<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StateController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShelveController;
use App\Http\Controllers\ShelvelocationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ZoneController;
use App\Models\Country;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('layout.main');
    });

    Route::resource('customers',CustomerController::class);

Route::get('/test',[DropdownController::class,'index']);
    Route::resource('stocks', StockController::class);
    Route::resource('users', UserController::class);
    Route::post('post',[UserController::class,'Test']);
    Route::resource('branches',BranchController::class);
    Route::resource('routes',RouteController::class);
    Route::resource('countries',CountryController::class);
    Route::resource('states',StateController::class);
    Route::resource('cities',CityController::class);
    Route::resource('couriers',CourierController::class);
    Route::resource('roles', RoleController::class);
    Route::get('dependent-dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);


Route::resource('designations', DesignationController::class);

Route::resource('suppliers', SupplierController::class);

Route::resource('shelvelocations',ShelvelocationController::class);

Route::resource('shelves',ShelveController::class);


Route::resource('products',ProductController::class);

Route::resource('zones',ZoneController::class);
Route::get('addcityzone',[ZoneController::class,'addcityzone']);

Route::get('addcountryzone',[ZoneController::class,'addcountryzone']);
});
