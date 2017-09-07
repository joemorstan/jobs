@extends('layouts.layout')

@section('content')

    @if($vacancies)
        @foreach($vacancies as $vacancy)
            <div class="card mb-3">
                <div class="card-block">
                    <h4 class="card-title"><a href="/vacancy/{{ $vacancy->id }}">{{ $vacancy->title }}</a></h4>
                    <h6 class="card-subtitle mb-2">{{ $vacancy->company }}</h6>
                    <h5 class="card-subtitle">$ {{ $vacancy->salary }}</h5>
                    <p class="card-text">{{ $vacancy->description }}</p>
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center">
            {{ $vacancies->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif


@endsection