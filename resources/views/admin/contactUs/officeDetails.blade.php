@extends('layouts.admin', ['pageTitle' => 'Office Details', 'active' => 'officeDetails'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body border-bottom-success">
            {{ Form::open(array('url' => route('admin.officeDetails.update'), 'method' => 'PUT', 'files' => 'true')) }}
                @csrf
                <input type="hidden" name="id" value="{{$details->id}}">

                <div class="form-group row" style="margin-bottom: 30px;">
                    <div class="col-md-6">
                        <label for="title_en">Office Title (english)</label>
                        <input class="form-control" name="title_en" id="title_en" value="{{$details->title_en}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="title_hy">Office Title (armenian)</label>
                        <input class="form-control" name="title_hy" id="title_hy" value="{{$details->title_hy}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom: 30px;">
                    <div class="col-md-6">
                        <label for="address_en">Office Address (english)</label>
                        <input class="form-control" name="address_en" id="address_en" value="{{$details->address_en}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="address_hy">Office Address (armenian)</label>
                        <input class="form-control" name="address_hy" id="address_hy" value="{{$details->address_hy}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom: 30px;">
                    <div class="col-md-6">
                        <label for="city_en">Office City (english)</label>
                        <input class="form-control" name="city_en" id="city_en" value="{{$details->city_en}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="city_hy">Office City (armenian)</label>
                        <input class="form-control" name="city_hy" id="city_hy" value="{{$details->city_hy}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom: 30px;">
                    <div class="col-md-6">
                        <label for="email_address">Email Address</label>
                        <input class="form-control" name="email_address" id="email_address" value="{{$details->email_address}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom: 30px;">
                    <div class="col-md-6">
                        <label for="work_hours_en">Work hours (english)</label>
                        <input class="form-control" name="work_hours_en" id="work_hours_en" value="{{$details->work_hours_en}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="work_hours_hy">Work hours (armenian)</label>
                        <input class="form-control" name="work_hours_hy" id="work_hours_hy" value="{{$details->work_hours_hy}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom: 30px;">
                    <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input class="form-control" name="phone" id="phone" value="{{$details->phone}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom: 30px;">
                    <div class="col-md-6">
                        <label for="mobile">Mobile</label>
                        <input class="form-control" name="mobile" id="mobile" value="{{$details->mobile}}" required>
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label>Current Office Photo</label>
                        <img src="{{$details->photo_url}}" alt="{{$details->title_en}} Photo" width="100%" />
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-6">
                        <label for="photo">Choose New Office Photo</label>
                        <input type="file" name="photo" accept="image/*"  />
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:30px;">
                    <div class="col-md-12">
                        <a href="{{route('admin.officeDetails.index')}}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
