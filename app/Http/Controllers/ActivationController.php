<?php

namespace App\Http\Controllers;

use Sentinel;
use Activation;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate($email, $activationCode)
    {
        $user = Sentinel::findByCredentials(['email' => $email]);

        if (Activation::complete($user, $activationCode)) {
            Sentinel::login($user);

            return redirect()->route('home');
        }
    }
}
