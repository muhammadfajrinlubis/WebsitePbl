<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(){
        if(!empty(Auth::check())){
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            }else if(Auth::user()->user_type == 2){
                return redirect('anak/dashboard');
            }
        }
        //dd(Hash::make(123456));
        return view('auth.login');
    }

 public function AuthLogin(Request $request){
    //dd($request->all());

    $remember = !empty($request->remember) ? true : false;

    if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

        if(Auth::user()->user_type == 1){
            return redirect('admin/dashboard');
        }else if(Auth::user()->user_type == 2){
            return redirect('anak/dashboard');
        }

        return redirect('admin/dashboard');
    } else {
        return redirect()->back()->with('error', 'Please enter correct email and password');
    }


     }

     public function forgotpassword(){
        return view('auth.forgot');
     }

     public function postForgotPassword(Request $request)
     {
         // Validasi input email
         $request->validate([
             'email' => 'required|email|exists:users,email'
         ]);

         $user = User::where('email', $request->email)->first();

         if ($user) {
             // Mengupdate remember token dan menyimpannya
             $user->remember_token = Str::random(60);  // Menjadikan token lebih panjang untuk keamanan
             $user->save();

             // Mengirim email dengan menggunakan job queue untuk peningkatan performa
             Mail::to($user->email)->queue(new ForgotPasswordMail($user));

             return redirect()->back()->with('success', 'Please check your email to reset your password.');
         }

         return redirect()->back()->with('error', 'Email address not found.');
     }


     public function reset($remember_token){
        $user = User::getTokenSingle($remember_token);
        if(!empty($user)){
            $data['user'] = $user;
            return view('auth.reset', $data);
        }else{
            abort(404);
        }

     }

        public function PostReset($token, Request $request){

            if($request->password == $request->cpassword){

                $user = User::getTokenSingle($token);
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(30);
                $user->save();
                return redirect(url(''))->with('success', 'Password Reset Successfully');

            }else{
                return redirect()->back()->with('error', 'password and confirm password does not macth');
            }
        }


     public function logout(){
        Auth::logout();
        return redirect(url(''));
     }


}
