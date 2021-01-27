<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\GTPController;
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
    //Box Crud
    Route::get('Create-Box',[BoxController::class,'create'])->name('Create-Box');
    //GTP GIP Crud
    Route::get('Create-GTP',[GTPController::class,'create'])->name('Create-GTP');
  });