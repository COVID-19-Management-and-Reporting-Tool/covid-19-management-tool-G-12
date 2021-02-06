<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\AddPayment;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HealthOfficerController;
use App\Http\Controllers\indexController;





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




Route::get('login',[UserAuthController::class,'login'])->middleware('AlreadyLoggedIn');
Route::get('register',[UserAuthController::class,'register'])->middleware('AlreadyLoggedIn');
Route::post('create',[UserAuthController::class,'create'])->name('auth.create');
Route::post('check',[UserAuthController::class,'check'])->name('auth.check');
Route::get('index',[UserAuthController::class,'index'])->middleware('isLogged');
Route::get('logout',[UserAuthController::class,'logout']);
Route::get('/donations',function(){
    return view('admin.donations');
});
Route::get('/payment',function(){
    return view('admin.payment');
});
Route::get('/patient',function(){
    return view('admin.patient');
});
Route::get('/healthofficer',function(){
    return view('admin.healthofficer');
});

Route::post('/donations',[DonationsController::class,'getDonations']);
Route::get('/donations',[DonationsController::class,'donationList']);
Route::get('/index',[indexController::class,'counts']);

Route::post('/healthofficer',[HealthOfficerController::class,'addOfficer']);
Route::get('/healthofficer',[HealthOfficerController::class,'workerList']);

Route::get('/patient',[PatientController::class,'patientList']);

//for paying up the officers
Route::get('/payment',[AddPayment::class,'pay']);




