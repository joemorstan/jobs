@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline-block">{{ $resume->title }}</h4>

                    @if($user)
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