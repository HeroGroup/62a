@extends('layouts.admin', ['pageTitle' => 'Site Landing Page', 'active' => 'landing'])
@section('content')
<div class="card shadow mb-4">
    <a href="#banners" class="d-block card-header py-3 border-bottom-info" data-toggle="collapse" role="button" aria-expanded="true">
        <h6 class="m-0 font-weight-bold text-primary">Banners</h6>
    </a>
    <div class="collapse show" id="banners">
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
                        <img src="{{$banner->image_url}}" style="width:100%;"/>
                    </div>
                    <div class="col-sm-6">
                        <div style="text-align:center;">
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
                                <span class="text">Delete Permanently</span>
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
            <div class="modal fade" id="new-banner-modal" tabindex="-1" role="dialog" aria-labelledby="newBannerModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
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
@endsection
