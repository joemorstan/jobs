<?php

namespace App\Http\Controllers;

use Sentinel;
use App\User;
use App\Resume;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function test()
    {
        //dd(Sentinel::getUser());
        $resume = Resume::find(13);
        dd($resume->user()->first());
    }
}
