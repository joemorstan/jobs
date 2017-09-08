@extends('layouts.layout')

@section('content')

    @if($vacancies)
        @foreach($vacancies as $vacancy)
            <div class="card mb-3">
                <div class="card-header">
                    <h4 class="d-inline-block"><a href="/vacancy/{{ $vacancy->id }}">{{ $vacancy->title }}</a></h4>

                    @if($user->favoriteVacancies()->where('vacancy_id', $vacancy->id)->first())
                        <form action="{{ route('removeFavoriteVacancy', ['id' => $vacancy->id]) }}" class="d-inline-block float-right" method="post" id="vacancy-{{ $vacancy->id }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a class="fav-star" href="javascript:void(0);" onclick="document.getElementById('vacancy-{{ $vacancy->id }}').submit();"><i class="fa fa-star fa-lg"></i></a>
                        </form>
                    @else
                        <form action="{{ route('addFavoriteVacancy', ['id' => $vacancy->id]) }}" class="d-inline-block float-right" method="post" id="vacancy-{{ $vacancy->id }}">
                            {{ csrf_field() }}
                            <a href="javascript:void(0);" onclick="document.getElementById('vacancy-{{ $vacancy->id }}').submit();"><i class="fa fa-star-o fa-lg fav-star"></i></a>
                        </form>
                    @endif


                </div>
                <div class="card-block">
                    <h6>{{ $vacancy->company }}</h6>
                    <h5 >$ {{ $vacancy->salary }}</h5>
                    <p class="card-text">{{ $vacancy->description }}</p>
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center">
            {{ $vacancies
            ->appends([
                'keyword' => $_GET['keyword'] ?? NULL,
                'city' => $_GET['city'] ?? NULL,
            ])
            ->links('vendor.pagination.bootstrap-4') }}
        </div>
    @endif


@endsection