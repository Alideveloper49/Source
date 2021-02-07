<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GIPController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    if(Auth::check()) {
        return redirect('/dashboard');
    } else {
        return view('welcome');
    }

})->name('welcome');
Route::post('login-action',[UserController::class,'action']);

Route::get('logout',[UserController::class,'logout']);

Route::group(['middleware'=>'auth'],function(){
    //Dashboard
    Route::view('/dashboard','Admin.dashboard')->name('dashboard');

    // Customer
    Route::get('Create-Customer',[CustomerController::class,'create'])->name('Create-Customer');// View Customer Form
    Route::post('Store-Customer',[CustomerController::class,'store'])->name('Store-Customer');// Insert Customer
    Route::get('Customer-manage',[CustomerController::class,'index'])->name('Customer-manage');// Index Customer
    Route::delete('Delete-Customer/{id}',[CustomerController::class,'destroy'])->name('Delete-Customer');// Delete Customer
    Route::get('Customer-Edit/{id}',[CustomerController::class,'edit'])->name('Customer-Edit');//view Customer Edit
    Route::post('Customer-Update/{id}',[CustomerController::class,'update'])->name('Customer-Update');

    //Profile
    Route::get('Profile',[ProfileController::class,'index'])->name('Profile');// view Profile data
    Route::post('Upload-Image',[ProfileController::class,'upload'])->name('upload-image');// Only Profile Image upload
    Route::post('Company-Update',[ProfileController::class,'Company_Update'])->name('Company-Update');// Company Update query

    //Box Crud
    Route::get('Create-Box',[BoxController::class,'create'])->name('Create-Box'); // View Form
    Route::post('Store-Box',[BoxController::class,'store'])->name('Store-Box');// Store Box
    Route::get('Box-manage',[BoxController::class,'index'])->name('Box-manage');// Manage View
    Route::delete('Box-delete/{id}',[BoxController::class,'destroy'])->name('Box-delete'); // Box Delete
    Route::get('Box-Edit/{id}',[BoxController::class,'edit'])->name('Box-Edit');// view Box Edit
    Route::post('Box-Update/{id}',[BoxController::class,'update'])->name('Box-Update');// view Box Update query

    //GTP GIP Crud
    Route::get('Create-GIP-GOP',[GIPController::class,'create'])->name('Create-GIP-GOP');// GIP && GOP two action
    Route::post('Store-GIP',[GIPController::class,'store'])->name('Store-GIP');// action store
    Route::delete('Delete-GTP/{type}/{node}',[GIPController::class,'destroy'])->name('Delete-GTP');// clear node 0 GIP && GOP
  });
