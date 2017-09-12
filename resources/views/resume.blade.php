@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline-block">{{ $resume->title }}</h4>

                    @if($user && $user->inRole('employer'))

                        <a href="{{ route('favoriteResume', ['id' => $resume->id]) }}" class="favorites-btn float-right">
                            <i class="fa fa-star fa-lg {{ !$user->favoriteResumes()->where('resume_id', $resume->id)->first() ?: 'fav-star' }}"></i>
                            {{ $user->favoriteResumes()->where('resume_id', $resume->id)->first() ? 'Remove from favorites' : 'Add to favorites' }}
                        </a>

                    @endif
                </div>

                <div class="card-block">

                    <p>Name: {{ $resume->user()->first()->first_name }} {{ $resume->user()->first()->last_name }}</p>

                    <p>City: {{ $resume->city()->first()->name }}</p>

                    <p>Desired Salary: <strong>$ {{ $resume->salary }}</strong></p>

                    <p>Email: <strong>{{ $resume->user()->first()->email }}</strong></p>

                    <p>{{ $resume->description }}</p>

                </div>
            </div>
        </div>
    </div>

@endsection