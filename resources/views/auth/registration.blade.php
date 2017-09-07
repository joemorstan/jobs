@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-7 mx-auto">
        <div class="card my-5">
            <div class="card-header">
                <h5>Registration</h5>
            </div>
            <div class="card-block">
                <form action="/register" method="post">
                    {{ csrf_field() }}

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">

                        <label for="selectRole">Client/Company</label>
                        <select class="form-control" id="selectRole" name="role">
                            <option value="3">I want to find job</option>
                            <option value="2">I want to hire a worker</option>
                        </select>

                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" id="inputFirstName" placeholder="Enter first name" name="first_name">

                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Enter last name" name="last_name">

                        <label for="inputEmail">Email address</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" name="email">

                        <label for="selectCity">City</label>
                        <select class="form-control" id="selectCity" name="city">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>

                        <label>Date of birth</label>
                        <div class="form-group row mb-0">

                            <label for="selectDay" class="col-1 col-form-label">Day</label>
                            <div class="col-2">
                                <select class="form-control" name="day">
                                    @for($i = 1; $i < 32; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <label class="col-1 col-form-label">Month</label>
                            <div class="col-4">
                                <select class="form-control" name="month">
                                    @for($i = 1; $i < 13; $i++)
                                        <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                    @endfor
                                </select>
                            </div>

                            <label class="col-1 col-form-label">Year</label>
                            <div class="col-3">
                                <select class="form-control" name="year">
                                    @for($i = 2001; $i > 1950; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Enter password" name="password">

                    </div>

                    <button type="submit" class="btn btn-primary float-right">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection