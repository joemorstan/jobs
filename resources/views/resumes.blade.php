@extends('layouts.layout')

@section('content')

    @if($resumes)
        @foreach($resumes as $resume)
            <div class="card mb-3">
                <div class="card-header">
                    <h4 class="d-inline-block"><a href="{{ route('resumeResult',$resume->id) }}">{{ $resume->title }}</a></h4>

                    @if($user && $user->inRole('employer'))
                        @if($user->favoriteResumes()->where('resume_id', $resume->id)->first())
                            <form action="{{ route('removeFavoriteResume', ['id' => $resume->id]) }}" class="d-inline-block float-right" method="post" id="resume-{{ $resume->id }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <a class="fav-star" href="javascript:void(0);" onclick="document.getElementById('resume-{{ $resume->id }}').submit();"><i class="fa fa-star fa-lg"></i></a>
                            </form>
                        @else
                            <form action="{{ route('addFavoriteResume', ['id' => $resume->id]) }}" class="d-inline-block float-right" method="post" id="resume-{{ $resume->id }}">
                                {{ csrf_field() }}
                                <a href="javascript:void(0);" onclick="document.getElementById('resume-{{ $resume->id }}').submit();"><i class="fa fa-star-o fa-lg fav-star"></i></a>
                            </form>
                        @endif
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