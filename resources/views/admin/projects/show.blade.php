@extends('layouts.admin', ['pageTitle' => 'Project '.$project->title_en, 'active' => 'projects'])
@section('content')
<style>
    .photo {
        border:2px dashed lightgray;
        border-radius:5px;
        position:relative;
        margin:15px;
    }
</style>
    <div class="card shadow mb-4">
        <a href="#projectInformation" class="d-block card-header py-3 border-bottom-success" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Project Information</h6>
        </a>
        <div class="collapse" id="projectInformation">
        <div class="card-body">
            <form method="post" action="{{route('admin.projects.update',$project->id)}}">
                @csrf
                <input type="hidden" name="_method" value="put" />

                <div style="margin-bottom:30px;">
                    <span> Inactive </span>
                    <label class="switch">
                        <input type="checkbox" name="is_active" @if($project->is_active == 1) checked @endif >
                        <span class="slider round"></span>
                    </label>
                    <span> Active </span>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="categories">Project Category</label>
                        {!! Form::select('categories[]',$categories,null,array('multiple'=>'multiple','class'=>'form-control','id'=>'categories')) !!}
                        <div style="font-size:12px;color:gray;">
                            current categories:
                            <?php
                            $res = "";
                            $cats = \Illuminate\Support\Facades\DB::table('project_categories')->where('project_id',$project->id)->get();
                            foreach($cats as $cat) {
                                $res .= (\Illuminate\Support\Facades\DB::table('categories')->find($cat->category_id)->title_en . ", ");
                            }
                            echo substr($res,0,strlen($res)-2);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top:35px;">
                        <a href="#" data-toggle="modal" data-target="#new-category-modal">+ Add new category</a>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="title_en">Project Title (en)</label>
                        <input class="form-control" name="title_en" id="title_en" value="{{$project->title_en}}" placeholder="Enter project title (english)" required>
                    </div>
                    <div class="col-md-6">
                        <label for="title_hy">Project Title (Armenian)</label>
                        <input class="form-control" name="title_hy" id="title_hy" value="{{$project->title_hy}}" placeholder="Enter project title (armenian)">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="description_en">Project Description (en)</label>
                        <textarea  class="form-control" name="description_en" id="description_en" placeholder="Enter project description (english)">{{$project->description_en}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="description_hy">Project Description (Armenian)</label>
                        <textarea  class="form-control" name="description_hy" id="description_hy" placeholder="Enter project description (armenian)">{{$project->description_hy}}</textarea>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="location_en">Project Location (en)</label>
                        <input class="form-control" name="location_en" id="location_en" value="{{$project->location_en}}" placeholder="Enter project location (english)">
                    </div>
                    <div class="col-md-6">
                        <label for="location_hy">Project Location (Armenian)</label>
                        <input class="form-control" name="location_hy" id="location_hy" value="{{$project->location_hy}}" placeholder="Enter project location (armenian)">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="type_en">Project Type (en)</label>
                        <input class="form-control" name="type_en" id="type_en" value="{{$project->type_en}}" placeholder="Enter project type (en)">
                    </div>
                    <div class="col-md-6">
                        <label for="type_hy">Project Type (Armenian)</label>
                        <input class="form-control" name="type_hy" id="type_hy" value="{{$project->type_hy}}" placeholder="Enter project type (armenian)">
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                <div class="col-md-6">
                    <label for="year">Year</label>
                    <input class="form-control" name="year" id="year" value="{{$project->year}}" placeholder="Enter project year">
                </div>

                </div>

        <div class="form-group row" style="margin-bottom:30px;">
            <div class="col-md-6">
                <label for="size_en">Project Size (en)</label>
                <input class="form-control" name="size_en" id="size_en" value="{{$project->size_en}}" placeholder="Enter project size (en)">
            </div>
            <div class="col-md-6">
                <label for="size_hy">Project Size (Armenian)</label>
                <input class="form-control" name="size_hy" id="size_hy" value="{{$project->size_hy}}" placeholder="Enter project size (armenian)">
            </div>
        </div>

        <div class="form-group row" style="margin-bottom:30px;">
            <div class="col-md-6">
                <label for="budget_en">Project Budget (en)</label>
                <input class="form-control" name="budget_en" id="budget_en" value="{{$project->budget_en}}" placeholder="Enter project budget (en)">
            </div>
            <div class="col-md-6">
                <label for="budget_hy">Project Budget (Armenian)</label>
                <input class="form-control" name="budget_hy" id="budget_hy" value="{{$project->budget_hy}}" placeholder="Enter project budget (armenian)">
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
    </div>

    <div class="card shadow mb-4">
        <a href="#projectPhotos" class="d-block card-header py-3 border-bottom-info" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Project Photos</h6>
        </a>
        <div class="collapse" id="projectPhotos">
            <div class="card-body ">
                <div class="row" style="padding:10px;">
                @if($photos->count() > 0)
                @foreach($photos as $photo)
                    <div class="col-md-6" id="{{$photo->id}}-container">
                        <div class="photo" id="{{$photo->id}}" @if($photo->is_cover) style="border:2px solid #52c2d2;" @endif>
                            <img src="{{$photo->photo_url}}" style="width:100%;">
                            <button type="button" class="btn btn-sm btn-danger" onclick="remove({{$photo->id}})" style="position:absolute;top:0;left:0;opacity:0.85;">
                                <i class="fa fa-fw fa-trash"></i> Remove
                            </button>
                            <button type="button" class="btn btn-sm btn-info" onclick="makeCover({{$photo->id}})" style="position:absolute;top:0;right:0;opacity:0.85;">
                                Make Cover
                            </button>
                        </div>
                    </div>
                @endforeach
                @else
                    <h4 style="text-align:center;">No photos yet!</h4>
                @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <a href="#uploadMore" class="d-block card-header py-3 border-bottom-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Upload more Photos</h6>
        </a>
        <div class="collapse" id="uploadMore">
            <div class="card-body">
                @component('components.imageUploaderGeneral', [
                    'uploadText' => 'Select Project Images from your computer, or drag here',
                    'uploadRoute' => route('admin.projects.imageUpload'),
                    'temp' => $project->id,
                    'multiple' => true
                    ])
                @endcomponent
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <a href="#projectVideos" class="d-block card-header py-3 border-bottom-warning" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Project Videos</h6>
        </a>
        <div class="collapse" id="projectVideos">
            <div class="card-body ">
                <div class="row" style="padding:10px;">
                @if($videos->count() > 0)
                @foreach($videos as $video)
                    <div class="col-md-6" id="video-{{$video->id}}-container">
                        <div id="video-{{$video->id}}">
                            <video controls style="border:1px solid lightgray;">
                              <source src="{{$video->video_url}}" type="video/mp4">
                              Your browser does not support HTML video.
                            </video>
                            <button type="button" class="btn btn-sm btn-danger" onclick="removeVideo({{$video->id}})" style="position:absolute;top:0;left:0;opacity:0.85;">
                                <i class="fa fa-fw fa-trash"></i> Remove
                            </button>
                        </div>
                    </div>
                @endforeach
                @else
                    <h4 style="text-align:center;">No videos yet!</h4>
                @endif
                </div>

                <div>
                    @component('components.videoUploaderGeneral', [
                        'uploadText' => 'Select Project Videos from your computer, or drag here',
                        'uploadRoute' => route('admin.projects.videoUpload'),
                        'temp' => $project->id,
                        'multiple' => true
                        ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="new-category-modal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCategoryModalLabel">Add new category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.categories.store')}}">
                        @csrf
                        <div class="form-group row" style="margin-bottom:30px;">
                            <div class="col-md-12">
                                <label for="title_en">Title (english)</label>
                                <input class="form-control" name="title_en" value="{{old('title_en')}}" placeholder="Enter category name (english)">
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:30px;">
                            <div class="col-md-12">
                                <label for="title_hy">Title (english)</label>
                                <input class="form-control" name="title_hy" value="{{old('title_hy')}}" placeholder="Enter category name (armenian)">
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:30px;text-align:center;">
                            <input type="submit" class="btn btn-success" value="Save and close" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function makeCover(id) {
            let formData = new FormData();
            formData.append('_token', "{{csrf_token()}}");
            formData.append("photo_id",id);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', "{{ route('admin.projects.makeCover') }}", true);
            xhr.addEventListener("load", function() {
                document.querySelector('.photo').style.border = "2px dashed lightgray";
                document.getElementById(id).style.border = "2px solid #52c2d2";
            });
            xhr.send(formData);
        }
        function remove(id) {
            let formData = new FormData();
            formData.append('_token', "{{csrf_token()}}");
            formData.append("photo_id",id);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', "{{ route('admin.projects.deleteImage') }}", true);
            xhr.addEventListener("load", function() {
                document.getElementById(id+"-container").remove();
            });
            xhr.send(formData);
        }
        function removeVideo(id) {
            let formData = new FormData();
            formData.append('_token', "{{csrf_token()}}");
            formData.append("video_id",id);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', "{{ route('admin.projects.deleteVideo') }}", true);
            xhr.addEventListener("load", function() {
                document.getElementById("video-"+id+"-container").remove();
            });
            xhr.send(formData);
        }
    </script>
@endsection
