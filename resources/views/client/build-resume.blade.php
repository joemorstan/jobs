@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <p>New resume</p>
            </div>

            <div class="card-block">
                <form action="/profile/build-resume" method="post">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label for="position" class="col-2 col-form-label">Desired Position</label>
                        <div class="col-4">
                            <input type="text" class="form-control" id="position" name="title" required>
                        </div>

                        <label for="salary" class="col-2 col-form-label">Desired Salary ($)</label>
                        <div class="col-4">
                            <input type="text" class="form-control" id="salary" name="salary">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="selectCity" class="col-2 col-form-label">City</label>
                        <div class="col-4">
                            <select class="form-control" id="selectCity" name="city" required>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-2 col-form-label">Description</label>
                        <div class="col-10">
                            <textarea name="description" id="description" class="form-control" cols="30" rows="6"></textarea>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="active">
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