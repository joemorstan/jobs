<?php

namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login')->with('title', 'Login');
    }

    public function postLogin(Request $request)
    {
        try {
            $remember_me = isset($request->remember_me) ? true : false;

            if (Sentinel::authenticate($request->all(), $remember_me)) {

                if (Sentinel::inRole('admin')) {
                    return redirect()->route('adminHome');
                } elseif (Sentinel::inRole('manager')) {
                    return redirect()->route('managerHome');
                } else {
                    return redirect()->route('home');
                }

            } else {
                return back()->with('error', 'Wrong credentials.');
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();

            return back()->with('error', "You are banned for $delay seconds");
        } catch (NotActivatedException $e) {
            return back()->with('error', "You account is not activated");
        }


    }

    public function logout()
    {
        Sentinel::logout();

        return redirect()->route('login');
    }
}
