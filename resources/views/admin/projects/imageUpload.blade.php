@extends('layouts.admin', ['pageTitle' => 'Upload Image for Project '.$projectTitle])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4>You can upload up to 5 photos for your project</h4>
        </div>

        <div class="card-body">
            @for($i=0;$i<5;$i++)
                @component('components.imageUploader', ['projectId' => $projectId])@endcomponent
            @endfor
        </div>

    </div>
@endsection
