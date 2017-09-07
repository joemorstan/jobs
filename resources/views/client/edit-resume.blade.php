@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <p>Created: {{ \Carbon\Carbon::parse($resume->created_at)->diffForHumans() }}</p>
                </div>

                <div class="card-block">
                    <form action="{{ route('updateResume', ['id' => $resume->id]) }}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        @elseif(session('success'))
                            <div class="alert alert-success">
                                <ul class="mb-0">
                                    <li>{{ session('success') }}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="position" class="col-2 col-form-label">Desired Position</label>
                            <div class="col-4">
                                <input type="text" class="form-control" id="position" name="title" value="{{ $resume->title }}">
                            </div>

                            <label for="salary" class="col-2 col-form-label">Desired Salary ($)</label>
                            <div class="col-4">
                                <input type="text" class="form-control" id="salary" name="salary" value="{{ $resume->salary }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="selectCity" class="col-2 col-form-label">City</label>
                            <div class="col-4">
                                <select class="form-control" id="selectCity" name="city_id">
                                    @foreach($cities as $city)
                                        <option
                                                @if($resume->city_id == $city->id)
                                                selected
                                                @endif
                                                value="{{ $city->id }}">

                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-2 col-form-label">Description</label>
                            <div class="col-10">
                            <textarea name="description" id="description" class="form-control" cols="30" rows="6">{{ $resume->description }}</textarea>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="active"
                                @if($resume->active)
                                    checked
                                @endif
                                >
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Publish immediately</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-lg btn-primary float-right">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection