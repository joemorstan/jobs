<?php

namespace App\Http\Controllers;

use App\City;
use Carbon\Carbon;
use Sentinel;
use App\User;
use Activation;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use App\Http\Requests\StoreNewUser;

class RegistrationController extends Controller
{
    public function create()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        $cities = City::all()->sortBy('name');
        return view('auth.registration')->with(['cities' => $cities, 'title' => 'Registration']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewUser $request)
    {
        $dob = "$request->year-$request->month-$request->day";

        $user = Sentinel::registerAndActivate(array_merge($request->all(), ['dob' => $dob]));

        $activation = Activation::create($user);

        $role = Sentinel::findRoleById($request->role);
        $role->users()->attach($user);

        event(new UserRegistered($user, $activation->code));

        return response()->redirectTo(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
