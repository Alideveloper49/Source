<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\GTPController;
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

    //Profile
    Route::get('Profile',[ProfileController::class,'index'])->name('Profile');// view Profile data
    Route::post('Upload-Image',[ProfileController::class,'upload'])->name('upload-image');

    //Box Crud
    Route::get('Create-Box',[BoxController::class,'create'])->name('Create-Box'); // View Form
    Route::post('Store-Box',[BoxController::class,'store'])->name('Store-Box');// Store Box
    Route::get('Box-manage',[BoxController::class,'index'])->name('Box-manage');// Manage View
    Route::delete('Box-delete/{id}',[BoxController::class,'destroy'])->name('Box-delete'); // Box Delete
    Route::get('Box-Edit/{id}',[BoxController::class,'edit'])->name('Box-Edit');// view Box Edit
    Route::post('Box-Update/{id}',[BoxController::class,'update'])->name('Box-Update');

    //GTP GIP Crud
    Route::get('Create-GTP',[GTPController::class,'create'])->name('Create-GTP');
  });
