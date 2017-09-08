@extends('layouts.layout')

@section('content')

    @if($resumes)
        <ul>
            @foreach($resumes as $resume)
                <li class="list-group-item">
                    <form action="{{ route('removeFavoriteResume', ['id' => $resume->id]) }}" class="d-inline-block mr-4" method="post" id="resume-{{ $resume->id }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a class="fav-star" href="javascript:void(0);" onclick="document.getElementById('resume-{{ $resume->id }}').submit();"><i class="fa fa-star fa-lg"></i></a>
                    </form>

                    <a href="/resume/{{ $resume->id }}">{{$resume->title}}</a>
                </li>
            @endforeach
        </ul>

        <div class="row justify-content-center">
            {{ $resumes->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif


@endsection