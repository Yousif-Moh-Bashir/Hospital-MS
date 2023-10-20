<?php

use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\InsuranceCompaniesController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::get('/', function () {
            return view('welcome');
        });

        ####################### USER ROUTE ##########################
        Route::get('dashboard/user', function () {
            return view('dashboard.user.dashboard');
        })->middleware(['auth'])->name('dashboard.user');

        ####################### ADMIN ROUTE ##########################
        Route::get('dashboard/admin', function () {
            return view('dashboard.admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');

/*---------------------------------------------------------------------------------*/

        Route::middleware(['auth:admin'])->group(function () {

            ####################### SECTIONS ROUTE ##########################
            Route::resource('section', SectionController::class );

            ####################### SECTIONS DOCTOR ##########################
            Route::resource('doctor', DoctorController::class );
            Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
            Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');

            ####################### SECTIONS ROUTE ##########################
            Route::resource('service', SingleServiceController::class );

            ############################# GroupServices route ##########################################
            Route::view('Add_GroupServices','livewire.GroupServices.include_create')->name('Add_GroupServices');

            ############################# Insurance Companies ##########################################
            Route::resource('insurance_companies',InsuranceCompaniesController::class);

            ############################# Ambulance Companies ##########################################
            Route::resource('ambulance',AmbulanceController::class);

            ############################# Patients route ##########################################
            Route::resource('Patients', PatientController::class);


        });

        require __DIR__.'/auth.php';

    });

