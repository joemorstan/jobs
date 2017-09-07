@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-7 mx-auto">
            <div class="card my-5">
                <div class="card-header">
                    <h5>Forgot Password!</h5>
                </div>
                <div class="card-block">
                    <form action="" method="post">

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{ csrf_field() }}

                        <div class="form-group">

                            <input type="password" class="form-control" id="inputPassword" placeholder="New password" name="password">

                        </div>

                        <div class="form-group">

                            <input type="password" class="form-control" id="inputPassword" placeholder="Confirm password" name="password_confirmation">

                        </div>

                        <button type="submit" class="btn btn-primary float-right">Send Code</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection