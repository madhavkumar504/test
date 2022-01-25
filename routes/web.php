<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::view('login','login');
Route::post('login',[UserController::class,'login']);
Route::view('signup','signup');
Route::post('signup',[UserController::class,'signup']);
Route::get('logout', function () {
    if(session()->has('user')){
        session()->forget('user');
        return redirect('login');
    }
});
Route::post('addproducts',[UserController::class,'addproducts']);
Route::get('dashboard',[UserController::class,'viewProducts']);