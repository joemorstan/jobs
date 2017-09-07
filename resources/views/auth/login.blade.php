@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-7 mx-auto">
        <div class="card my-5">
            <div class="card-header">
                <h5>Please Login!</h5>
            </div>
            <div class="card-block">
                <form action="/login" method="post">

                    {{ csrf_field() }}

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-group">

                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">

                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">

                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="remember_me">
                            Remember me
                        </label>
                    </div>

                    <a href="/forgot-password">Forgot password?</a>
                    <button type="submit" class="btn btn-primary float-right">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection