@extends('layouts.layout')

@section('content')

    <div class="card my-5">
        <div class="card-block">
            <h4 class="card-title">Find the resume matching your needs!</h4>

            <form action="{{ route('findResume') }}" method="get" class="mt-5">

                <div class="form-group row">
                    <div class="col-11">
                        <input type="text" class="form-control" placeholder="Search for..." name="keyword">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary" type="submit">Go!</button>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-6">
                        <select class="form-control" id="selectCity" name="city">
                            <option value="">Everywhere</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection