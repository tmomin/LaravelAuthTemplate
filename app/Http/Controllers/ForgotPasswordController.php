<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Sentinel;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if(count($user) == 0)
            return redirect()->back()->with(['success' => "Reset code was sent to your email."]);

        $reminder = Reminder::exists($user) ?: Reminder::create($user);

        $this->sendEmail($user, $reminder->code);

        return redirect()->back()->with(['success' => "Reset code was sent to your email."]);
    }

    public function resetPassword($email, $resetCode)
    {
        $user = User::byEmail($email);

        if(count($user) == 0)
            abort(404);

        if($reminder = Reminder::exists($user)) {
            if($resetCode == $reminder->code)
                return view('auth.reset-password');
            else
                return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function postResetPassword(Request $request, $email, $resetCode)
    {
        $this->validate($request, [
            'password' => 'confirmed|required|min:5|max:10',
            'password_confirmation' => 'required|min:5|max:10',
        ]);

        $user = User::byEmail($email);

        if(count($user) == 0)
            abort(404);

        if($reminder = Reminder::exists($user)) {
            if($resetCode == $reminder->code) {
                Reminder::complete($user, $resetCode, $request->password);

                return redirect('/login')->with('success', 'Please login with your new password');
            }
            else
                return redirect('/');
        } else {
            return redirect('/');
        }
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.forgot-password', [
            'user' => $user,
            'code' => $code,
        ], function ($message) use ($user) {
            $message->to($user->email);

            $message->subject("Hello $user->first_name, reset your password.");
        });
    }
}
