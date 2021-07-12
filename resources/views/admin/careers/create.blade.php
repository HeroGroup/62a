@extends('layouts.admin', ['pageTitle' => 'New Job Opening', 'active' => 'careers'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-success">
            {!! Form::open(array('url' => route('admin.careers.store'), 'method' => 'POST')) !!}
                @csrf
                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="job_title_en">Job Title (english)</label>
                        <input class="form-control" name="job_title_en" id="job_title_en" value="{{old('job_title_en')}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="job_title_hy">Job Title (armenian)</label>
                        <input class="form-control" name="job_title_hy" id="job_title_hy" value="{{old('job_title_hy')}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="job_description_en">Job Description (english)</label>
                        <textarea  class="form-control" name="job_description_en" id="job_description_en" value="{{old('job_description_en')}}"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="job_description_hy">Job Description (armenian)</label>
                        <textarea  class="form-control" name="job_description_hy" id="job_description_hy" value="{{old('job_description_hy')}}"></textarea>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="location_en">Location (english)</label>
                        <input class="form-control" name="location_en" id="location_en" value="{{old('location_en')}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="location_hy">Location (armenian)</label>
                        <input class="form-control" name="location_hy" id="location_hy" value="{{old('location_hy')}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-12">
                        <a href="{{route('admin.careers.index')}}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
