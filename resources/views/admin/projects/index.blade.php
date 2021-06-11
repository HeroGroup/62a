@extends('layouts.admin', ['pageTitle' => 'Projects', 'newButton' => true, 'newButtonUrl' => 'projects/create', 'newButtonText' => 'new project', 'active' => 'projects'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-primary">
            <div class="row">
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
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
