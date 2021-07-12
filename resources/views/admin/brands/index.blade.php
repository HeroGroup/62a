@extends('layouts.admin', ['pageTitle' => 'Employers', 'newButton' => false, 'active' => 'brands'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-primary">
            {{ Form::open(array('url' => route('admin.brands.store'), 'method' => 'POST', 'files' => 'true')) }}
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="text" name="brand_name" class="form-control" placeholder="Brand Name" />
                    </div>
                    <div class="col-md-6">
                        <label>Brand Logo</label>
                        <input type="file" name="photo" />
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success" value="save" />
                    </div>
                </div>
            {!! Form::close() !!}
            <hr/>
            <div class="row">
            @if($brands->count()>0)
            @foreach($brands as $brand)
                <div class="col-md-3" id="{{$brand->id}}">
                    <div>
                        <img src="{{$brand->photo_url}}" alt="{{$brand->brand_name}}" style="width:100%;" />
                    </div>
                    <div>
                        <button class="btn btn-danger btn-icon-split" onclick="destroy('{{route('admin.brands.destroy',$brand->id)}}','{{$brand->id}}','{{$brand->id}}')">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Remove</span>
                        </button>
                    </div>
                </div>
            @endforeach
            @else
            <h3>No employers yet!</h3>
            @endif
            </div>
        </div>
    </div>
@endsection
