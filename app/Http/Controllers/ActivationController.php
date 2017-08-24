<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;

class ActivationController extends Controller
{
    public function activate($email, $activationCode)
    {
        $user = User::whereEmail($email)->first();

        if(Activation::complete($user, $activationCode))
        {
            return redirect('/login');
        } else {

        }
    }
}
