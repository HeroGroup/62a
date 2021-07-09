@extends('layouts.admin', ['pageTitle' => 'Projects', 'newButton' => true, 'newButtonUrl' => 'projects/create', 'newButtonText' => 'new project', 'active' => 'projects'])
@section('content')
<div class="card shadow mb-4">
    <a href="#projects-section" class="d-block card-header py-3 border-bottom-info" data-toggle="collapse" role="button" aria-expanded="true">
        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
    </a>

    <div class="collapse show" id="projects-section">
        <div class="card-body">
            <div class="row">
            @if($projects->count()>0)
            @foreach($projects as $project)
                <div class="col-md-4">
                    <a style="cursor:pointer;text-decoration:none;color:#333;" href="{{route('admin.projects.show',$project->id)}}">
                        <?php
                            $p = \Illuminate\Support\Facades\DB::table('project_photos')->where('project_id',$project->id)->where('is_cover',1)->first();
                            if(! $p)
                                $p = \Illuminate\Support\Facades\DB::table('project_photos')->where('project_id',$project->id)->first();
                            $cover = $p ? $p->photo_url : "/images/blank.jpg";
                        ?>
                        <img src="{{$cover}}" alt="cover" style="width:100%;max-height:250px;" />
                        <h4 style="padding:10px 0;">{{$project->title_en}}</h4>
                        <h6 style="color:gray;">
                        <?php
                            $res = "";
                            $cats = \Illuminate\Support\Facades\DB::table('project_categories')->where('project_id',$project->id)->get();
                            foreach($cats as $cat) {
                                $res .= (\Illuminate\Support\Facades\DB::table('categories')->find($cat->category_id)->title_en . ", ");
                            }
                            echo substr($res,0,strlen($res)-2);
                        ?>
                        </h6>
                    </a>
                </div>
            @endforeach
            @else
            <h3>No Projects Yet!</h3>
            @endif
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <a href="#bottom-section" class="d-block card-header py-3 border-bottom-success" data-toggle="collapse" role="button" aria-expanded="true">
        <h6 class="m-0 font-weight-bold text-primary">Bottom Section of Projects page</h6>
    </a>
    <div class="collapse" id="bottom-section">
        <div class="card-body">
        {{ Form::open(array('url' => route('admin.projects.updateBottomSection'), 'method' => 'POST', 'files' => 'true')) }}

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
                        <button class="btn btn-success" type="submit">Save</a>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
