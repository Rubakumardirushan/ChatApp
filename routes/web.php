<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Authcontroller;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Frnd\Frndrequest;
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
})->middleware('auth');

Route::get('/home', function () {
    return view('welcome');
})->middleware('auth');
Route::view('register','Auth.register')->middleware('guest');

Route::post('authendicate',[Authcontroller::class,'register'])->middleware('guest');
Route::post('otpverfiy',[Authcontroller::class,'verifyOtp'])->middleware('guest');
Route::post('resendotp',[Authcontroller::class,'resendotp'])->middleware('guest');
Route::view('login','Auth.Login')->name('login')->middleware('guest');
Route::post('authlogin',[Authcontroller::class,'logindata'])->middleware('guest');
Route::view('email','Auth.email')->middleware('guest');
Route::post('email-otp',[Authcontroller::class,'emailOTP'])->middleware('guest');
Route::post('verifyemail',[Authcontroller::class,'verifyEmailOTP'])->middleware('guest');
Route::post('newpassword',[Authcontroller::class,'newPassword'])->middleware('guest');

Route::get('/logout', function () {
    $user = Auth::user();
    if ($user) {
        $user->active_status = "offline";
        $user->last_seen = Carbon::now('Asia/Colombo');
        $user->save();
    }
    Auth::logout();
    return redirect('/login');
})->middleware('auth');
Route::get('frndlist',[Frndrequest::class,'frndlist'])->middleware('auth');
Route::post('addfrnd/{username}',[Frndrequest::class,'sendfrndrequest'])->middleware('auth');
Route::get('frndrequest',[Frndrequest::class,'viewfrndrequest'])->middleware('auth');
Route::post('acceptfrnd/{username}',[Frndrequest::class,'acceptfrndrequest'])->middleware('auth');
Route::post('rejectfrnd/{username}',[Frndrequest::class,'rejectfrndrequest'])->middleware('auth');
Route::get('viewfrnd',[Frndrequest::class,'viewfrnd'])->middleware('auth');