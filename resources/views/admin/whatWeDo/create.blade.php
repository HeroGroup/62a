@extends('layouts.admin', ['pageTitle' => 'What We Do', 'active' => 'whatWeDo'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-success">
            {{ Form::open(array('url' => route('admin.whatWeDo.store'), 'method' => 'POST', 'files' => 'true')) }}
                @csrf

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="title_en">Title (en)</label>
                        <input class="form-control" name="title_en" id="title_en" value="{{old('title_en')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="title_hy">Title (Armenian)</label>
                        <input class="form-control" name="title_hy" id="title_hy" value="{{old('title_hy')}}">
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
                        <label for="photo">Choose Photo for Item</label>
                        <input type="file" name="photo" accept="image/*"  />
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                <div class="col-md-12">
                    <a href="{{route('admin.whatWeDo.index')}}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
