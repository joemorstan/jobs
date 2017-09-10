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

                        <form action="{{ route('activateVacancy', ['id' => $vacancy->id]) }}" method="post" id="activate-vacancy-{{ $vacancy->id }}">
                            {{ csrf_field() }}

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="{{ $vacancy->active }}"
                                           onclick="document.getElementById('activate-vacancy-{{ $vacancy->id }}').submit();"
                                            {{ !$vacancy->active ?: 'checked' }}>
                                    Active
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

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('form').filter(function() {
            return this.id.match(/update-vacancy/);
        }).submit(function(event){
            event.preventDefault()

            $form = $(this)

            $.ajax({
                type: 'POST',
                url: $form.attr('action'),

                success: function (response) {
                    $form.parent().children('span').text('Updated at ' + response.updatedAt)
                },

                error: function (response) {
                    console.log(response)
                }
            })
        })
    </script>
@endsection