@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $resume->title }}</h4>
                </div>

                <div class="card-block">

                    <p>Name: {{ $resume->user()->first()->first_name }}</p>

                    <p>City: {{ $resume->city()->first() }}</p>

                    <p>Salary: <strong>$ {{ $resume->salary }}</strong></p>

                    <p>Email: <strong>{{ $resume->user()->first()->email }}</strong></p>

                    <p>{{ $resume->description }}</p>

                </div>
            </div>
        </div>
    </div>

@endsection