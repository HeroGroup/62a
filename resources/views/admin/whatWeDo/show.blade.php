@extends('layouts.admin', ['pageTitle' => $item->title_en, 'active' => 'whatWeDo'])
@section('content')
    <div class="card shadow mb-4">
        <a href="#generalInformation" class="d-block card-header py-3 border-bottom-success" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">General Information</h6>
        </a>
        <div class="collapse" id="generalInformation">
            <div class="card-body">
                <form method="post" action="{{route('admin.whatWeDo.update',$item->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="put" />

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="title_en">Title (en)</label>
                            <input class="form-control" name="title_en" id="title_en" value="{{$item->title_en}}">
                        </div>
                        <div class="col-md-6">
                            <label for="title_hy">Title (Armenian)</label>
                            <input class="form-control" name="title_hy" id="title_hy" value="{{$item->title_hy}}">
                        </div>
                    </div>

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="description_en">Description (en)</label>
                            <textarea  class="form-control" name="description_en" id="description_en">{{$item->description_en}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="description_hy">Description (Armenian)</label>
                            <textarea  class="form-control" name="description_hy" id="description_hy">{{$item->description_hy}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{route('admin.whatWeDo.index')}}" class="btn btn-secondary">Cancel</a>
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
                    <div class="col-sm-6">
                        <h5>Current Photo</h5>
                        <img src="{{$item->photo_url ?? '/images/blank.jpg'}}" alt="{{$item->title_en}}" style="width:100%;max-height:450px;">
                    </div>
                    <div class="col-sm-6">
                        <h5>Upload New Photo</h5>
                        @component('components.imageUploaderGeneral', [
                            'uploadText' => 'Select image from your computer, or drag here',
                            'uploadRoute' => route('admin.whatWeDo.itemImageUpload'),
                            'temp' => $item->id])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
