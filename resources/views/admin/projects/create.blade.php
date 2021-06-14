@extends('layouts.admin', ['pageTitle' => 'New Project', 'active' => 'projects'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-success">
            <form method="post" action="{{route('admin.projects.store')}}">
                @csrf

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="categories">Project Category</label>
                        {!! Form::select('categories[]',$categories,null,array('multiple'=>'multiple','class'=>'form-control','id'=>'categories')) !!}
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="title_en">Project Title (en)</label>
                        <input class="form-control" name="title_en" id="title_en" value="{{old('title_en')}}" placeholder="Enter project title (english)" required>
                    </div>
                    <div class="col-md-6">
                        <label for="title_hy">Project Title (Armenian)</label>
                        <input class="form-control" name="title_hy" id="title_hy" value="{{old('title_hy')}}" placeholder="Enter project title (armenian)">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="description_en">Project Description (en)</label>
                        <textarea  class="form-control" name="description_en" id="description_en" value="{{old('description_en')}}" placeholder="Enter project description (english)"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="description_hy">Project Description (Armenian)</label>
                        <textarea  class="form-control" name="description_hy" id="description_hy" value="{{old('description_hy')}}" placeholder="Enter project description (armenian)"></textarea>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="location_en">Project Location (en)</label>
                        <input class="form-control" name="location_en" id="location_en" value="{{old('location_en')}}" placeholder="Enter project location (english)">
                    </div>
                    <div class="col-md-6">
                        <label for="location_hy">Project Location (Armenian)</label>
                        <input class="form-control" name="location_hy" id="location_hy" value="{{old('location_hy')}}" placeholder="Enter project location (armenian)">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                       <label for="type_en">Project Type (en)</label>
                       <input class="form-control" name="type_en" id="type_en" value="{{old('type_en')}}" placeholder="Enter project type (en)">
                   </div>
                    <div class="col-md-6">
                        <label for="type_hy">Project Type (Armenian)</label>
                        <input class="form-control" name="type_hy" id="type_hy" value="{{old('type_hy')}}" placeholder="Enter project type (armenian)">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="year">Year</label>
                        <input class="form-control" name="year" id="year" value="{{old('year')}}" placeholder="Enter project year">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                       <label for="size_en">Project Size (en)</label>
                       <input class="form-control" name="size_en" id="size_en" value="{{old('size_en')}}" placeholder="Enter project size (en)">
                   </div>
                    <div class="col-md-6">
                        <label for="size_hy">Project Size (Armenian)</label>
                        <input class="form-control" name="size_hy" id="size_hy" value="{{old('size_hy')}}" placeholder="Enter project size (armenian)">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                       <label for="budget_en">Project Budget (en)</label>
                       <input class="form-control" name="budget_en" id="budget_en" value="{{old('budget_en')}}" placeholder="Enter project budget (en)">
                   </div>
                    <div class="col-md-6">
                        <label for="budget_hy">Project Budget (Armenian)</label>
                        <input class="form-control" name="budget_hy" id="budget_hy" value="{{old('budget_hy')}}" placeholder="Enter project budget (armenian)">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-12">
                        <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
