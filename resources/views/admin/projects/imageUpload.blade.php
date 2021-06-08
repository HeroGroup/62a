@extends('layouts.admin', ['pageTitle' => 'Upload Image for Project '.$projectTitle])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            @component('components.imageUploader', ['projectId' => $projectId])@endcomponent
        </div>
    </div>
@endsection
