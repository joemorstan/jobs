@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-11 mx-auto">
        <h1>My resumes</h1>


        @if($resumes)
            @foreach($resumes as $resume)
                <div class="card my-4">
                    <div class="card-header">
                        <span class="text-muted">
                            @if($resume->active)
                                Updated at {{ \Carbon\Carbon::parse($resume->updated_at)->toFormattedDateString() }}
                            @else
                                Not active
                            @endif
                        </span>
                        <form action="/dashboard/resume/updateDate/{{ $resume->id }}" class="d-inline-block" method="post" id="resume-{{ $resume->id }}">
                            {{ csrf_field() }}
                            <a href="javascript:void(0);" onclick="document.getElementById('resume-{{ $resume->id }}').submit();" class="btn btn-danger ml-3">Update</a>
                        </form>

                    </div>

                    <div class="card-block">
                        <h4><a href="/dashboard/resume/edit/{{ $resume->id }}">{{ $resume->title }}</a></h4>

                        @if($resume->salary > 0)
                            <p><strong>{{ $resume->salary }} USD</strong></p>
                        @endif

                    </div>
                </div>
            @endforeach
        @endif

        <div class="text-center">
            <a href="{{ route('buildResume') }}" class="btn btn-outline-primary btn-lg">Create new</a>
        </div>

    </div>
</div>

@endsection