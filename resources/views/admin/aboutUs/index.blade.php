@extends('layouts.admin', ['pageTitle' => 'About Us', 'newButton' => true, 'newButtonUrl' => 'aboutUs/create', 'newButtonText' => 'new item', 'active' => 'aboutUs'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-primary">
            <div class="row">
            @if($items->count()>0)
            @foreach($items as $item)
                <div class="col-md-4" id="{{$item->id}}">
                    <div style="cursor:pointer;text-decoration:none;color:#333;">
                        <a href="{{route('admin.aboutUs.show',$item->id)}}">
                            <img src="{{$item->photo_url ?? '/images/blank.jpg'}}" alt="{{$item->title_en}}" style="width:100%;max-height:450px;" />
                        </a>
                        <div style="display:flex;justify-content:space-between;align-items:center;padding-top:10px;">
                            <h4 style="padding:0;margin-bottom:0;">{{$item->title_en}}</h4>
                            <a href="" class="btn btn-danger btn-icon-split" onclick="destroy('{{route('admin.aboutUs.destroy',$item->id)}}','{{$item->id}}','{{$item->id}}')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Remove</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <h4 style="text-align:center">No Items yet!</h4>
            @endif
            </div>
        </div>
    </div>
@endsection
