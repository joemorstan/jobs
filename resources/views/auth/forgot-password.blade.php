@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-7 mx-auto">
        <div class="card my-5">
            <div class="card-header">
                <h5>Forgot Password!</h5>
            </div>
            <div class="card-block">
                <form action="/forgot-password" method="post">
                    {{ csrf_field() }}

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-group">

                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">

                    </div>

                    <button type="submit" class="btn btn-primary float-right">Send Code</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection