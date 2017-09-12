@extends('layouts.layout')

@section('content')

    @if($resumes)

        <ul>
            @foreach($resumes as $resume)
                <li class="list-group-item d-block">

                    <a href="{{ route('resumeResult', $resume->id) }}">{{$resume->title}}</a>

                    <a href="{{ route('favoriteResume', ['id' => $resume->id]) }}" class="favorites-btn float-right">
                        <i class="fa fa-star fa-lg fav-star"></i>
                        Remove from favorites
                    </a>

                </li>
            @endforeach
        </ul>

        <div class="row justify-content-center">
            {{ $resumes->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif

@endsection