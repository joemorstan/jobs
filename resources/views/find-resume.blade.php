@extends('layouts.layout')

@section('content')

    @if($resumes)
        @foreach($resumes as $resume)
            <div class="card mb-3">
                <div class="card-block">
                    <h4 class="card-title"><a href="/resume/{{ $resume->id }}">{{ $resume->title }}</a></h4>
                    <h6 class="card-subtitle">{{ $resume->user()->first()->first_name }} {{ $resume->user()->first()->last_name }} {{ $resume->salary }} </h6>
                    <p class="card-text">{{ $resume->description }}</p>
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center">
            {{ $resumes->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif


@endsection