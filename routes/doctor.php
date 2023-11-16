<?php

use App\Http\Controllers\Doctor\DiagnosticsController;
use App\Http\Controllers\Doctor\InvoiceController;
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

        ####################### DOCTOR ROUTE ##########################
        Route::get('dashboard/doctor', function () {
            return view('doctor.dashboard');
        })->middleware(['auth:doctor'])->name('dashboard.doctor');

    /*---------------------------------------------------------------------------------*/

        Route::middleware(['auth:doctor'])->prefix('doctor')->group(function () {

            #################### invoices route ###################
            Route::resource('invoices', InvoiceController::class);
            Route::post('update_status', [InvoiceController::class, 'update_status'])->name('invoices.update_status');
            Route::get('completed_invoices', [InvoiceController::class,'completedInvoices'])->name('completedInvoices');
            Route::get('review_invoices', [InvoiceController::class,'reviewInvoices'])->name('reviewInvoices');

            //############################# Diagnostics route ##########################################
            Route::resource('diagnosis', DiagnosticsController::class);
            Route::post('add_review', [DiagnosticsController::class,'addReview'])->name('add_review');

        });//END OF auth:doctor

        require __DIR__.'/auth.php'; //AUTH ROUTES

    });

