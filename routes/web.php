<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Authcontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('register','Auth.register');

Route::post('authendicate',[Authcontroller::class,'register']);
Route::post('otpverfiy',[Authcontroller::class,'verifyOtp']);
Route::post('resendotp',[Authcontroller::class,'resendotp']);
Route::view('login','Auth.Login');
Route::post('authlogin',[Authcontroller::class,'logindata']);
