@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <p>Edit vacancy</p>
            </div>

            <div class="card-block">
                <form action="{{ route('updateVacancy', ['id' => $vacancy->id]) }}" method="post">
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
                        <label for="position" class="col-2 col-form-label">Position</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="position" name="title" value="{{ $vacancy->title }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputCompany" class="col-2 col-form-label">Company name</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="inputCompany" name="company" value="{{ $vacancy->company }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="selectCity" class="col-2 col-form-label">City</label>
                        <div class="col-4">
                            <select class="form-control" id="selectCity" name="city_id">
                                @foreach($cities as $city)
                                    <option
                                        @if($vacancy->city_id == $city->id)
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
                        <label for="salary" class="col-2 col-form-label">Salary ($)</label>
                        <div class="col-4">
                            <input type="text" class="form-control" id="salary" name="salary" value="{{ $vacancy->salary }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-2 col-form-label">Description</label>
                        <div class="col-10">
                            <textarea name="description" id="description" class="form-control" cols="30" rows="6">{{ $vacancy->description }}</textarea>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="active"
                            @if($vacancy->active)
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