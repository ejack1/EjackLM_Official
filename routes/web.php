<?php

use App\Http\Controllers\AdminSettingController;
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
use App\Http\Controllers\RPOController;
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
use App\Http\Controllers\ShipmentController;
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


    Route::resource('RPO', RPOController::class);
    Route::get('RPO_pendings', [RPOController::class,'RPO_PENDINGS']);

    Route::get('/RPO_print/{id}', [RPOController::class,'RPO_PRINT']);
    Route::get('/RPO_detail/{id}', [RPOController::class,'RPO_detail']);
    Route::get('/RPO_status_update/{id}', [RPOController::class,'RPO_status_update']);
    // Route::post('/rpo_status_updated', [RPOController::class, 'RPO_status_updated']);
    Route::put('rpo_status_updated/{id}', [RPOController::class, 'RPO_status_updated']);
    Route::get('/rpo.create', [RPOController::class,'rpo_create']);
    Route::get('/RPO_delete/{id}', [RPOController::class,'RPO_delete']);

    Route::post('/rpo_search', [RPOController::class,'RPO_search']);
  
    // settings 
    Route::get('/settings.main', [AdminSettingController::class,'index']);
    Route::get('/settings.social', [AdminSettingController::class,'SettingSocial']);
    Route::get('/settings.smtpconfig', [AdminSettingController::class,'Smtp_config']);
    Route::get('/settings.paymentsetting', [AdminSettingController::class,'paymentsetting']);
    Route::get('/settings.testimonials', [AdminSettingController::class,'testimonials']);
    Route::get('/testimonial.create', [AdminSettingController::class,'testimonial_create']);
    
    Route::post('/  mainsettings.applychanges', [AdminSettingController::class,'applychanges']);
    Route::post('/mainsettings.applySocialchanges', [AdminSettingController::class,'applySocialchanges']);
    Route::post('/mainsettings.Smtp_config_update', [AdminSettingController::class,'Smtp_config_update']);
    Route::post('/mainsettings.paymentsettingUpdate', [AdminSettingController::class,'paymentsettingUpdate']);
    Route::post('/mainsettings.testimonial.create', [AdminSettingController::class,'testimonialStore']);
    Route::post('/mainsettings.testimonial.updated', [AdminSettingController::class,'testimonial_updated']);
    

    Route::get('/testimonial_delete/{id}', [AdminSettingController::class,'testimonial_delete']);
    Route::get('/testimonial_update_page/{id}', [AdminSettingController::class, 'testimonial_update_page']);
    
    

    // Shipment 
    Route::get('/shipments.main', [ShipmentController::class,'index']);
    Route::get('/shipments.create', [ShipmentController::class,'ship_create']);
    Route::post('/shipments.store', [ShipmentController::class,'shipment_store']);
    Route::get('/shipment_update/{id}', [ShipmentController::class,'shipment_update']);
    Route::post('/shipments.updated', [ShipmentController::class,'shipments_updated']);
    Route::get('/shipment_delete/{id}', [ShipmentController::class,'shipment_delete']);
    Route::get('/shipments.return_to_client', [ShipmentController::class,'return_to_client']);
    Route::get('/shipments.delivered_shipments', [ShipmentController::class,'delivered_shipments']);
    Route::get('/shipments.add_shipment', [ShipmentController::class,'ship_create']);
    Route::get('/shipments.deleted_shipments', [ShipmentController::class,'deleted_shipments']);
    Route::get('/shipment_delete_restore/{id}', [ShipmentController::class,'shipment_delete_restore']);
    Route::get('/shipment_delete_permanent/{id}', [ShipmentController::class,'delete_permanent']);
    Route::get('/shipments.inTransit_shipments', [ShipmentController::class,'inTransit_shipments']);
    Route::post('/shipment_search', [ShipmentController::class,'shipment_search']);
    
    Route::get('export', [ShipmentController::class, 'export'])->name('export');
    Route::post('import', [ShipmentController::class, 'import'])->name('import');

    
    Route::get('/shipments.import_shipments', [ShipmentController::class,'import_shipments']);
    Route::get('/shipments.export_shipments', [ShipmentController::class,'export_shipments']);
    Route::get('/shipment_archive/{id}', [ShipmentController::class,'shipment_archive']);
    Route::get('/shipment_De_archive/{id}', [ShipmentController::class,'shipment_De_archive']);
    Route::get('/shipments.archive_shipments', [ShipmentController::class,'archive_shipments']);

    Route::get('/shipment_delete_from_search/{id}', [ShipmentController::class,'shipment_delete_from_search']);
    Route::get('/shipment_archive_from_search/{id}', [ShipmentController::class,'shipment_archive_from_search']);
    Route::get('/shipments.print_shipments', [ShipmentController::class,'print_shipments']);

    Route::post('/shipments.bulk_print', [ShipmentController::class,'bulk_print']);
    
    
    // mainsettings.applySocialchanges
    // rpo.store

    // RPO_detail
    // ->route('RPO.pendings');
    

});
