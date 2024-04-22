<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\SendOTPMail;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class Authcontroller extends Controller
{
   
    public function register(Request $request){

        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $otp = mt_rand(100000, 999999);
        $email = $request->email;
        $user =New User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->temp_otp = $otp;
        $user->save();
        Mail::to($email)->send(new SendOTPMail($otp));
        return view('Auth.Otp')->with('email',$email);

        
    }



    public function verifyOtp(Request $request){
        $otp = $request->otp;
        $email = $request->email;
        $user = User::where('email',$email)->first();
        if($user->temp_otp == $otp){
            $user->email_verified_at = Carbon::now('Asia/Colombo');
            $user->temp_otp = null;
            $user->status = "active";
            $user->active_status = "online";
            $user->save();
            Auth::login($user);
            return redirect('/');
        }
        return view('Auth.Otp')->with('email',$email)->with('error','Invalid OTP');
    }

    public function resendotp(Request $request){
        $email = $request->input('email');
        $user=User::where('email',$email)->first();
        $otp = mt_rand(100000, 999999);
        $user->temp_otp=$otp;
        $user->save();
        Mail::to($email)->send(new SendOTPMail($otp));
    
            return view('Auth.Otp')->with('email',$email);
    
    }

   public function logindata(Request $request){
$validatedData = Validator::make($request->all(), [
    'email' => 'email|required',
    'password' => 'required'
]);
if($validatedData->fails()){
    return redirect()->back()->withErrors($validatedData)->withInput();

   }

   $email = $request->email;
    $password = $request->password;
    $user = User::where('email',$email)->first();
     if($user){
        if($user->status == 'active'){
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                Auth::login($user);
                return redirect('/');
            }else{
                return redirect('/login')->with('error','Invalid Credentials');
            }
          
        }else{
            return view('Auth.Otp')->with('email',$email);
        }
        
    }else{
        return redirect('/login')->with('error','Invalid Credentials');
    }
}}