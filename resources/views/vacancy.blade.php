@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline-block">{{ $vacancy->title }}</h4>

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