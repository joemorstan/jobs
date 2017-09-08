@extends('layouts.layout')

@section('content')

    @if($vacancies)
        <ul>
            @foreach($vacancies as $vacancy)
                <li class="list-group-item">
                    <form action="{{ route('removeFavoriteVacancy', ['id' => $vacancy->id]) }}" class="d-inline-block mr-4" method="post" id="vacancy-{{ $vacancy->id }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a class="fav-star" href="javascript:void(0);" onclick="document.getElementById('vacancy-{{ $vacancy->id }}').submit();"><i class="fa fa-star fa-lg"></i></a>
                    </form>

                    <a href="/vacancy/{{ $vacancy->id }}">{{$vacancy->title}}</a>
                </li>
            @endforeach
        </ul>

        <div class="row justify-content-center">
            {{ $vacancies->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif


@endsection