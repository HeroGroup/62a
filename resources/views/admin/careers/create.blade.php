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
            {!! Form::close() !!}
        </div>
    </div>
@endsection
