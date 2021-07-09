@extends('layouts.admin', ['pageTitle' => 'About Us', 'newButton' => true, 'newButtonUrl' => 'teamMembers/create', 'newButtonText' => 'new team member', 'active' => 'teamMembers'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-primary">
            <div class="row">
            @if($members->count()>0)
            @foreach($members as $member)
                <div class="col-md-4" id="{{$member->id}}">
                    <div style="cursor:pointer;text-decoration:none;color:#333;">
                        <a href="{{route('admin.teamMembers.show',$member->id)}}">
                            <img src="{{$member->photo_url ?? '/images/member_default.png'}}" alt="{{$member->name_en}}" style="width:100%;max-height:450px;" />
                        </a>
                        <div style="display:flex;justify-content:space-between;align-items:center;padding-top:10px;">
                            <h4 style="padding:0;margin-bottom:0;">{{$member->name_en}}</h4>
                            <a href="" class="btn btn-danger btn-icon-split" onclick="destroy('{{route('admin.teamMembers.destroy',$member->id)}}','{{$member->id}}','{{$member->id}}')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Remove</span>
                            </a>
                        </div>
                        <h5 style="color:gray;">{{$member->position_en}}</h5>
                    </div>
                </div>
            @endforeach
            @else
            <h4 style="text-align:center">No Members yet!</h4>
            @endif
            </div>
        </div>
    </div>
@endsection
