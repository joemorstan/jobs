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

                        <form action="{{ route('updateVacancyDate', ['id' => $vacancy->id]) }}" class="d-inline-block" id="update-vacancy">
                            <button type="submit" class="btn btn-outline-success ml-3">Update</button>
                        </form>


                        <form action="{{ route('deleteVacancy', ['id' => $vacancy->id]) }}" class="d-block float-right" method="post" id="delete-vacancy">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                        </form>

                    </div>

                    <div class="card-block">
                        <h4><a href="{{ route('editVacancy', ['id' => $vacancy->id]) }}">{{ $vacancy->title }}</a></h4>

                        @if($vacancy->salary > 0)
                            <p><strong>{{ $vacancy->salary }} USD</strong></p>
                        @endif

                        <form action="{{ route('activateVacancy', ['id' => $vacancy->id]) }}" method="post" id="activate-vacancy">

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"
                                            {{ !$vacancy->active ?: 'checked' }}>
                                    {{ $vacancy->active ? 'Deactivate' : 'Activate' }}
                                </label>
                            </div>
                        </form>

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