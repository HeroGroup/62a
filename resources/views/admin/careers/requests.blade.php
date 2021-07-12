@extends('layouts.admin', ['pageTitle' => 'Job Requests for '.$jobTitle, 'active' => 'careers'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
            @foreach($requests as $request)
                <div class="col-md-4" id="{{$request->id}}">
                    <div class="card mb-4 py-3 border-left-info">
                        <div class="card-body" style="padding-top:0;padding-bottom:0;">
                            <div style="color:inherit;text-decoration: none;">
                                <h3>{{$request->name}}</h3>
                                <h6 style="color:gray;">{{$request->email}}</h6>
                                <p>{{$request->mobile}}</p>
                                <p class="text-info">posted at {{date('Y-m-d H:i', strtotime($request->created_at))}}</p>
                                <a href="{{$request->cv}}" target="_blank" class="text-primary">Resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
