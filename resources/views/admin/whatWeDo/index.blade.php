@extends('layouts.admin', ['pageTitle' => 'What We Do', 'newButton' => true, 'newButtonUrl' => 'whatWeDo/create', 'newButtonText' => 'new Item', 'active' => 'whatWeDo'])
@section('content')
<div class="card shadow mb-4">
    <a href="#items-section" class="d-block card-header py-3 border-bottom-primary" data-toggle="collapse" role="button" aria-expanded="true">
        <h6 class="m-0 font-weight-bold text-primary">Items</h6>
    </a>

    <div class="collapse show" id="items-section">
        <div class="card-body">
            <div class="row">
            @if($items->count()>0)
            @foreach($items as $item)
                <div class="col-md-4" id="{{$item->id}}">
                    <div style="cursor:pointer;text-decoration:none;color:#333;">
                        <a href="{{route('admin.whatWeDo.show',$item->id)}}">
                            <img src="{{$item->photo_url ?? '/images/blank.jpg'}}" alt="{{$item->title_en}}" style="width:100%;max-height:450px;" />
                        </a>
                        <div style="display:flex;justify-content:space-between;align-items:center;padding-top:10px;">
                            <h4 style="padding:0;margin-bottom:0;">{{$item->title_en}}</h4>
                            <a href="" class="btn btn-danger btn-icon-split" onclick="destroy('{{route('admin.whatWeDo.destroy',$item->id)}}','{{$item->id}}','{{$item->id}}')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Remove</span>
                            </a>
                        </div>
                        <p style="color:gray;">{{$item->description_en}}</p>
                    </div>
                </div>
            @endforeach
            @else
            <h4 style="text-align:center">No Items yet!</h4>
            @endif
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <a href="#additional-information" class="d-block card-header py-3 border-bottom-info" data-toggle="collapse" role="button" aria-expanded="true">
        <h6 class="m-0 font-weight-bold text-primary">Additional Information</h6>
    </a>

    <div class="collapse" id="additional-information">
        <div class="card-body">
        {{ Form::open(array('url' => route('admin.whatWeDo.updateSection'), 'method' => 'POST', 'files' => 'true')) }}
            @csrf

            <div class="form-group row" style="margin-bottom:30px;">
                <div class="col-md-6">
                    <label for="title_en">Title (english)</label>
                    <input class="form-control" name="title_en" value="{{$section->title_en}}" >
                </div>
                <div class="col-md-6">
                    <label for="title_hy">Title (armenian)</label>
                    <input class="form-control" name="title_hy" value="{{$section->title_hy}}" >
                </div>
            </div>

            <div class="form-group row" style="margin-bottom:30px;">
                <div class="col-md-6">
                    <label for="description_en">Description (english)</label>
                    <textarea class="form-control" name="description_en">{{$section->description_en}}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="description_hy">Description (armenian)</label>
                        <textarea class="form-control" name="description_hy">{{$section->description_hy}}</textarea>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label>Current image for what we do section</label>
                        <div>
                            <img src="{{$section->image_url}}" alt="{{$section->title_en}}" width="100%" />
                        </div>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="photo">Choose an image for what we do section</label>
                        <input type="file" name="photo" />
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <button class="btn btn-success" type="submit">Save</a>
                    </div>
                </div>

        {!! Form::close() !!}
        </div>
    <div>
</div>
@endsection
