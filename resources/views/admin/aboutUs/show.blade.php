@extends('layouts.admin', ['pageTitle' => $member->name, 'active' => 'aboutUs'])
@section('content')
    <div class="card shadow mb-4">
        <a href="#generalInformation" class="d-block card-header py-3 border-bottom-success" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">General Information</h6>
        </a>
        <div class="collapse" id="generalInformation">
            <div class="card-body">
                <form method="post" action="{{route('admin.aboutUs.update',$member->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="put" />

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input class="form-control" name="name" id="name" value="{{$member->name}}">
                        </div>
                    </div>

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="position_en">Position (en)</label>
                            <input class="form-control" name="position_en" id="position_en" value="{{$member->position_en}}">
                        </div>
                        <div class="col-md-6">
                            <label for="position_hy">Position (Armenian)</label>
                            <input class="form-control" name="position_hy" id="position_hy" value="{{$member->position_hy}}">
                        </div>
                    </div>

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="description_en">Description (en)</label>
                            <textarea  class="form-control" name="description_en" id="description_en">{{$member->description_en}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="description_hy">Description (Armenian)</label>
                            <textarea  class="form-control" name="description_hy" id="description_hy">{{$member->description_hy}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{route('admin.aboutUs.index')}}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <a href="#photo" class="d-block card-header py-3 border-bottom-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Photo</h6>
        </a>
        <div class="collapse" id="photo">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Current Photo</h5>
                        <img src="{{$member->photo_url ?? '/images/member_default.png'}}" alt="{{$member->name}}" style="max-height:450px;">
                    </div>
                    <div class="col-md-6">
                        <h5>Upload New Photo</h5>
                        @component('components.imageUploaderGeneral', [
                            'uploadText' => 'Select member image from your computer, or drag here',
                            'uploadRoute' => route('admin.aboutUs.memberImageUpload'),
                            'temp' => $member->id])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
