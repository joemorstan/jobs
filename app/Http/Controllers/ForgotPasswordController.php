<?php

namespace App\Http\Controllers;

use Mail;
use Reminder;
use Sentinel;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordEmail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        $user = Sentinel::findByCredentials(['email' => $request->email]);

        if($user) {
            $reminder = Reminder::exists($user) ?: Reminder::create($user);

            Mail::to($user)->send(new ResetPasswordEmail($user, $reminder->code));
        }

        return back()->with('success', 'Activation email was sent!');
    }

    public function resetPassword($email, $resetCode)
    {
        if (!$user = Sentinel::findByCredentials(['email' => $email])) {
            abort(404);
        }

        if (!$reminder = Reminder::exists($user)) {
            abort(404);
        }

        if ($resetCode != $reminder->code) {
            abort(404);
        }

        return view('auth.reset-password');
    }

    public function postResetPassword(Request $request, $email, $resetCode)
    {
        $this->validate($request, [
           'password' => 'confirmed|required|min:6',
           'password_confirmation' => 'required|min:6'
        ]);

        if (!$user = Sentinel::findByCredentials(['email' => $email])) {
            abort(404);
        }

        if (!$reminder = Reminder::exists($user)) {
            abort(404);
        }

        if ($resetCode != $reminder->code) {
            abort(404);
        }

        Reminder::complete($user, $resetCode, $request->password);

        return redirect()->route('login')->with('success', 'Your password was successfully modified! Please login with new credentials.');
    }

}
