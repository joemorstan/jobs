@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $vacancy->title }}</h4>
                </div>

                <div class="card-block">

                    <p>Company: {{ $vacancy->company }}</p>

                    <p>City: {{ $vacancy->city()->first()->name }}</p>

                    <p>Salary: <strong>$ {{ $vacancy->salary }}</strong></p>

                    <p>Email: <strong>{{ $vacancy->user()->first()->email }}</strong></p>

                    <p>{{ $vacancy->description }}</p>

                </div>
            </div>
        </div>
    </div>

@endsection