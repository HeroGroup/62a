@extends('layouts.admin', ['pageTitle' => 'Site Landing Page', 'active' => 'landing'])
@section('content')
<div class="card shadow mb-4">
    <a href="#banners" class="d-block card-header py-3 border-bottom-info" data-toggle="collapse" role="button" aria-expanded="true">
        <h6 class="m-0 font-weight-bold text-primary">Website Banners</h6>
    </a>
    <div class="collapse" id="banners">
        <div class="card-body">
            <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#new-banner-modal" >
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">New Banner</span>
            </button>

            <hr>

            @foreach($banners as $banner)
                <div class="row" id="{{$banner->id}}">
                    <div class="col-sm-6">
                        <img src="{{$banner->image_url}}" alt="{{$banner->title_en}}" style="width:100%;"/>
                    </div>
                    <div class="col-sm-6">
                        <div style="text-align:center;">
                            <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#upload-video-modal-{{$banner->id}}">
                                <span class="icon text-white-50">
                                    <i class="fas fa-play"></i>
                                </span>
                                <span class="text">Upload Video</span>
                            </button>
                            <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#edit-banner-modal-{{$banner->id}}">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Update Details</span>
                            </button>
                            <button class="btn btn-danger btn-icon-split" onclick="destroy('{{route('admin.landing.deleteBanner')}}','{{$banner->id}}','{{$banner->id}}')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </button>
                        </div>
                        <div style="padding-top:10px;">
                            <h5>{{$banner->title_en}}</h5>
                            <h5>{{$banner->title_hy}}</h5>
                            <h5>{{$banner->description_en}}</h5>
                            <h5>{{$banner->description_hy}}</h5>
                            <h5>{{$banner->location_en}}</h5>
                            <h5>{{$banner->location_hy}}</h5>
                        </div>
                    </div>
                </div>

                <!-- Upload Video Modal-->
                <div class="modal fade" id="upload-video-modal-{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="uploadVideoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadVideoModalLabel">Upload Video</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if($banner->video_url)
                                    <video controls>
                                        <source src="{{$banner->video_url}}">
                                    </video>
                                    <div>
                                        <form action="{{route('admin.landing.deleteBannerVideo')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$banner->id}}">
                                        <button class="btn btn-danger btn-icon-split" type="submit">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete Video</span>
                                        </button>
                                        </form>
                                    </div>
                                    <hr>
                                @endif

                                {!! Form::open(['url' => route('admin.landing.uploadBannerVideo'), 'method' => 'POST', 'files' => 'true']) !!}
                                @csrf
                                <input type="hidden" name="id" value="{{$banner->id}}">
                                <div class="form-group row" style="margin-bottom:30px;">
                                    <div class="col-md-6">
                                        <label for="video"> @if($banner->video_url) Replace with new video @else Upload new video @endif </label>
                                        <input type="file" accept="video/*" name="video">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom:30px;">
                                    <div class="col-md-6">
                                        <button class="btn btn-success" type="submit">Save and close</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Banner Modal-->
                <div class="modal fade" id="edit-banner-modal-{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="editBannerModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBannerModalLabel">Banner Details</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('admin.landing.updateBannerDetails',$banner->id)}}">
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT" />
                                    <input type="hidden" name="id" value="{{$banner->id}}" />
                                    <div>
                                        <span> Inactive </span>
                                        <label class="switch">
                                            <input type="checkbox" name="is_active" @if($banner->is_active == 1) checked @endif >
                                            <span class="slider round"></span>
                                        </label>
                                        <span> Active </span>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="title_en">Title (english)</label>
                                            <input class="form-control" name="title_en" id="title_en" value="{{$banner->title_en}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="title_hy">Title (armenian)</label>
                                            <input class="form-control" name="title_hy" id="title_hy" value="{{$banner->title_hy}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="description_en">Description (english)</label>
                                            <textarea class="form-control" name="description_en" id="description_en">{{$banner->description_en}}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="description_hy">Description (armenian)</label>
                                            <textarea class="form-control" name="description_hy" id="description_hy">{{$banner->description_hy}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="location_en">Location (english)</label>
                                            <input class="form-control" name="location_en" id="location_en" value="{{$banner->location_en}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="location_hy">Location (armenian)</label>
                                            <input class="form-control" name="location_hy" id="location_hy" value="{{$banner->location_hy}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-success"  type="submit">Save</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach

            <!-- New Banner Modal-->
            <div class="modal fade" id="new-banner-modal" tabindex="-1" role="dialog" aria-labelledby="newBannerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newBannerModalLabel">New Banner</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @component('components.imageUploaderGeneral', [
                                'uploadText' => 'Select banner image from your computer, or drag here',
                                'uploadRoute' => route('admin.landing.uploadBannerImage'),
                                'temp' => 0])
                            @endcomponent
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-success" href="javascript:void(0)" onclick="window.location.reload()">Save</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <a href="#top-section" class="d-block card-header py-3 border-bottom-warning" data-toggle="collapse" role="button" aria-expanded="true">
        <h6 class="m-0 font-weight-bold text-primary">Top Section of First Page</h6>
    </a>
    <div class="collapse" id="top-section">
        <div class="card-body">
        {{ Form::open(array('url' => route('admin.landing.updateTopSection'), 'method' => 'PUT', 'files' => 'true')) }}

                @csrf

                <div style="margin-bottom:30px;">
                    <span> Inactive </span>
                    <label class="switch">
                        <input type="checkbox" name="is_active" @if($top->is_active) checked @endif >
                        <span class="slider round"></span>
                    </label>
                    <span> Active </span>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="title_en">Title (english)</label>
                        <input class="form-control" name="title_en" value="{{$top->title_en}}" >
                    </div>
                    <div class="col-md-6">
                        <label for="title_hy">Title (armenian)</label>
                        <input class="form-control" name="title_hy" value="{{$top->title_hy}}" >
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="description_en">Description (english)</label>
                        <textarea class="form-control" name="description_en">{{$top->description_en}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="description_hy">Description (armenian)</label>
                        <textarea class="form-control" name="description_hy">{{$top->description_hy}}</textarea>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label>Current image for top section</label>
                        <div>
                            <img src="{{$top->image_url}}" alt="{{$top->image_title_en}}" width="100%" />
                        </div>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="photo">Choose an image for top section</label>
                        <input type="file" name="photo" />
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="image_title_en">Image Title (english)</label>
                        <input class="form-control" name="image_title_en" value="{{$top->image_title_en}}" >
                    </div>
                    <div class="col-md-6">
                        <label for="image_title_hy">Image Title (armenian)</label>
                        <input class="form-control" name="image_title_hy" value="{{$top->image_title_hy}}">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <button class="btn btn-success" type="submit">Save</a>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <a href="#bottom-section" class="d-block card-header py-3 border-bottom-success" data-toggle="collapse" role="button" aria-expanded="true">
        <h6 class="m-0 font-weight-bold text-primary">Bottom Section of First Page</h6>
    </a>
    <div class="collapse" id="bottom-section">
        <div class="card-body">
        {{ Form::open(array('url' => route('admin.landing.updateBottomSection'), 'method' => 'PUT', 'files' => 'true')) }}
                @csrf

                <div style="margin-bottom:30px;">
                    <span> Inactive </span>
                    <label class="switch">
                        <input type="checkbox" name="is_active" @if($bottom->is_active) checked @endif >
                        <span class="slider round"></span>
                    </label>
                    <span> Active </span>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="title_en">Title (english)</label>
                        <input class="form-control" name="title_en" value="{{$bottom->title_en}}" >
                    </div>
                    <div class="col-md-6">
                        <label for="title_hy">Title (armenian)</label>
                        <input class="form-control" name="title_hy" value="{{$bottom->title_hy}}" >
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="description_en">Description (english)</label>
                        <textarea class="form-control" name="description_en">{{$bottom->description_en}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="description_hy">Description (armenian)</label>
                        <textarea class="form-control" name="description_hy">{{$bottom->description_hy}}</textarea>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label>Current image for bottom section</label>
                        <div>
                            <img src="{{$bottom->image_url}}" alt="{{$bottom->title_en}}" width="100%" />
                        </div>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="photo">Choose an image for bottom section</label>
                        <input type="file" name="photo" />
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <button class="btn btn-success"  type="submit">Save</a>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
