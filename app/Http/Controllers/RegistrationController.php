<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use User;
use Mail;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $user = Sentinel::register($request->all());
        $activation = Activation::create($user);
        $role = Sentinel::findRoleBySlug('user');
        $role->users()->attach($user);
        $this->sendEmail($user, $activation->code);
        return response()->json(['redirect' => '/']);
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.activation', [
            'user' => $user,
            'code' => $code,
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->fist_name, activate your account.");
        });
    }
}
