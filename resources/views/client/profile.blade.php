@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-11 mx-auto">
            <h3>My profile</h3>

            <br>
            <br>

            <h5>Authorization</h5>
            <hr>

            <p>Email: {{ Sentinel::getUser()->getUserLogin() }}</p>

            <p>Password: **********</p>

            <br>
            <h5>Personal information</h5>
            <hr>

            <p>First name: {{ Sentinel::getUser()->first_name }}</p>
            <p>Last name: {{ Sentinel::getUser()->last_name }}</p>
            <p>Date of birth: 01/06/1992</p>
            <p>Living in: {{ Sentinel::getUser()->location }}</p>

        </div>
    </div>

@endsection