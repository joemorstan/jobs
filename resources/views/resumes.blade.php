@extends('layouts.layout')

@section('content')

    @if($resumes)
        @foreach($resumes as $resume)
            <div class="card mb-3">
                <div class="card-header">
                    <h4 class="d-inline-block"><a href="{{ route('resumeResult', $resume->id) }}">{{ $resume->title }}</a></h4>

                    @if($user && $user->inRole('employer'))

                            <a href="{{ route('favoriteResume', ['id' => $resume->id]) }}" class="favorites-btn float-right">
                                <i class="fa fa-star fa-lg {{ !$user->favoriteResumes()->where('resume_id', $resume->id)->first() ?: 'fav-star' }}"></i>
                                {{ $user->favoriteResumes()->where('resume_id', $resume->id)->first() ? 'Remove from favorites' : 'Add to favorites' }}
                            </a>

                    @endif

                </div>
                <div class="card-block">
                    <h6>{{ $resume->user()->first()->first_name }} {{ $resume->user()->first()->last_name }}</h6>
                    <h6>$ {{ $resume->salary }}</h6>
                    <p class="card-text">{{ $resume->description }}</p>
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center">
            {{ $resumes->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif


@endsection