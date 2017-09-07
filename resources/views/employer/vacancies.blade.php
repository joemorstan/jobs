@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-11 mx-auto">
        <h1>My vacancies</h1>


        @if($vacancies)
            @foreach($vacancies as $vacancy)
                <div class="card my-4">
                    <div class="card-header">

                        <span class="text-muted">
                            @if($vacancy->active)
                                Updated at {{ \Carbon\Carbon::parse($vacancy->updated_at)->toFormattedDateString() }}
                            @else
                                Not active
                            @endif
                        </span>

                        <form action="{{ route('updateVacancyDate', ['id' => $vacancy->id]) }}" class="d-inline-block" method="post" id="update-vacancy-{{ $vacancy->id }}">
                            {{ csrf_field() }}
                            <a href="javascript:void(0);" onclick="document.getElementById('update-vacancy-{{ $vacancy->id }}').submit();" class="btn btn-outline-success ml-3">Update</a>
                        </form>


                        <form action="{{ route('deleteVacancy', ['id' => $vacancy->id]) }}" class="d-block float-right" method="post" id="delete-vacancy-{{ $vacancy->id }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <a href="javascript:void(0);" onclick="document.getElementById('delete-vacancy-{{ $vacancy->id }}').submit();" class="btn btn-danger">Delete</a>
                        </form>

                    </div>

                    <div class="card-block">
                        <h4><a href="{{ route('editVacancy', ['id' => $vacancy->id]) }}">{{ $vacancy->title }}</a></h4>

                        @if($vacancy->salary > 0)
                            <p><strong>{{ $vacancy->salary }} USD</strong></p>
                        @endif

                    </div>
                </div>
            @endforeach
        @endif

        <div class="text-center">
            <a href="{{ route('buildVacancyGet') }}" class="btn btn-outline-primary btn-lg">Create new</a>
        </div>

    </div>
</div>

@endsection