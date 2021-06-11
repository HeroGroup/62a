@extends('layouts.admin', ['pageTitle' => 'Upload Image for Project '.$projectTitle, 'active' => 'projects'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-success">
            @component('components.imageUploader', ['projectId' => $projectId])@endcomponent
            <div class="col-md-12" style="text-align:right;">
                <a href="{{route('admin.projects.index')}}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Done</span>
                </a>
            </div>
        </div>
    </div>
@endsection
