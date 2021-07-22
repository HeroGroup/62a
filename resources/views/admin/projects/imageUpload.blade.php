@extends('layouts.admin', ['pageTitle' => 'Upload Image for Project '.$projectTitle, 'active' => 'projects'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-success">
            <div>
                @component('components.imageUploaderGeneral', [
                    'uploadText' => 'Select Project Images from your computer, or drag here',
                    'uploadRoute' => route('admin.projects.imageUpload'),
                    'temp' => $projectId,
                    'multiple' => true
                    ])
                @endcomponent
            </div>

            <div style="visibility:hidden;">
                <h1>Completed!</h1>
            </div>

            <div class="col-md-12" style="text-align:right;">
                <a href="{{route('admin.projects.videoUploadView',$projectId)}}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Next - Upload Video</span>
                </a>
            </div>
        </div>
    </div>
@endsection
