<?php

namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('client.profile')->with('title', 'Profile');
    }
}
