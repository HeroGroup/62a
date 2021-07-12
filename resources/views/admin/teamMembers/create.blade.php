@extends('layouts.admin', ['pageTitle' => 'New Team Member', 'active' => 'teamMembers'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-success">
            {{ Form::open(array('url' => route('admin.teamMembers.store'), 'method' => 'POST', 'files' => 'true')) }}
                @csrf

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="name_en">Name (english)</label>
                        <input class="form-control" name="name_en" id="name_en" value="{{old('name_en')}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="name_hy">Name (armenian)</label>
                        <input class="form-control" name="name_hy" id="name_hy" value="{{old('name_hy')}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="position_en">Position (en)</label>
                        <input class="form-control" name="position_en" id="position_en" value="{{old('position_en')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="position_hy">Position (Armenian)</label>
                        <input class="form-control" name="position_hy" id="position_hy" value="{{old('position_hy')}}">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="description_en">Description (en)</label>
                        <textarea  class="form-control" name="description_en" id="description_en" value="{{old('description_en')}}"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="description_hy">Description (Armenian)</label>
                        <textarea  class="form-control" name="description_hy" id="description_hy" value="{{old('description_hy')}}"></textarea>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-12">
                        <label for="photo">Choose Photo for Member</label>
                        <input type="file" name="photo" accept="image/*"  />
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-12">
                        <a href="{{route('admin.teamMembers.index')}}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
