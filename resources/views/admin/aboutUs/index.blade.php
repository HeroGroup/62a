@extends('layouts.admin', ['pageTitle' => 'About Us', 'newButton' => true, 'newButtonUrl' => 'aboutUs/create', 'newButtonText' => 'new item', 'active' => 'aboutUs'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-primary">
            <div class="row">
            @if($items->count()>0)
            @foreach($items as $item)
                <div class="col-md-4" id="{{$item->id}}">
                    <div style="cursor:pointer;text-decoration:none;color:#333;">
                        <a href="{{route('admin.aboutUs.show',$item->id)}}">
                            <img src="{{$item->photo_url ?? '/images/blank.jpg'}}" alt="{{$item->title_en}}" style="width:100%;max-height:450px;" />
                        </a>
                        <div style="display:flex;justify-content:space-between;align-items:center;padding-top:10px;">
                            <h4 style="padding:0;margin-bottom:0;">{{$item->title_en}}</h4>
                            <a href="" class="btn btn-danger btn-icon-split" onclick="destroy('{{route('admin.aboutUs.destroy',$item->id)}}','{{$item->id}}','{{$item->id}}')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Remove</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <h4 style="text-align:center">No Items yet!</h4>
            @endif
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <a href="#top-section" class="d-block card-header py-3 border-bottom-info" data-toggle="collapse" role="button" aria-expanded="true">
            <h6 class="m-0 font-weight-bold text-primary">Top Section of about us page</h6>
        </a>

        <div class="collapse" id="top-section">
            <div class="card-body">
                <form method="post" action="{{route('admin.aboutUs.update',1)}}">
                    @csrf
                    <input type="hidden" name="_method" value="put" />

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="title_en">Title (en)</label>
                            <input class="form-control" name="title_en" id="title_en" value="{{$haveAnyQuestions->title_en}}">
                        </div>
                        <div class="col-md-6">
                            <label for="title_hy">Title (Armenian)</label>
                            <input class="form-control" name="title_hy" id="title_hy" value="{{$haveAnyQuestions->title_hy}}">
                        </div>
                    </div>

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="description_en">Description (en)</label>
                            <textarea  class="form-control" name="description_en" id="description_en">{{$haveAnyQuestions->description_en}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="description_hy">Description (Armenian)</label>
                            <textarea  class="form-control" name="description_hy" id="description_hy">{{$haveAnyQuestions->description_hy}}</textarea>
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
        <a href="#have-any-questions-section" class="d-block card-header py-3 border-bottom-warning" data-toggle="collapse" role="button" aria-expanded="true">
            <h6 class="m-0 font-weight-bold text-primary">Have any questions section</h6>
        </a>

        <div class="collapse" id="have-any-questions-section">
            <div class="card-body border-bottom-info">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Have any questions photo</h5>
                        <img src="{{$haveAnyQuestions->photo_url}}" width="100%" />
                    </div>
                    <div class="col-md-4">
                        <h5>Change Photo</h5>
                        @component('components.imageUploaderGeneral', [
                            'uploadText' => 'Select image from your computer, or drag here',
                            'uploadRoute' => route('admin.aboutUs.imageUpload'),
                            'temp' => 1])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
