@extends('layouts.admin', ['pageTitle' => 'List of Open Jobs', 'newButton' => true, 'newButtonUrl' => 'careers/create', 'newButtonText' => 'new job', 'active' => 'careers'])
@section('content')
<div class="card shadow mb-4">
    <div class="card-body border-bottom-primary">
        @if($careers->count()>0)
        <div class="row">
        @foreach($careers as $career)
            <div class="col-md-6" id="{{$career->id}}">
                <div class="card shadow" style="text-decoration:none;">
                    <div class="card-body">
                        <h4>{{$career->job_title_en}}</h4>
                        <h6>{{$career->location_en}}</h6>
                        <?php $requests = \Illuminate\Support\Facades\DB::table('career_requests')->where('career_id',$career->id)->count(); ?>
                        <p>Number of requests: <span class="text-success">{{$requests}}</span></p>
                        <div style="display:flex;justify-content:space-between">
                            <div style="visibility:@if($requests>=0) visible @else hidden @endif">
                                <a href="{{route('admin.careers.careerRequests',$career->id)}}" class="btn btn-success">show requests</a>
                            </div>
                            <div>
                                <a href="{{route('admin.careers.show',$career->id)}}" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-icon-split" onclick="destroy('{{route('admin.careers.destroy',$career->id)}}','{{$career->id}}','{{$career->id}}')">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Remove</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        @else
            <h4 style="color:gray;">No Job Openings.</h4>
        @endif
    </div>
</div>
@endsection
