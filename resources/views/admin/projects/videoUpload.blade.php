@extends('layouts.admin', ['pageTitle' => 'Upload Video for Project '.$projectTitle, 'active' => 'projects'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-success">
            <div>
                @component('components.videoUploaderGeneral', [
                    'uploadText' => 'Select Project Videos from your computer, or drag here',
                    'uploadRoute' => route('admin.projects.videoUpload'),
                    'temp' => $projectId,
                    'multiple' => true
                    ])
                @endcomponent
            </div>

            <div style="visibility:hidden;">
                <h1>Completed!</h1>
            </div>

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
