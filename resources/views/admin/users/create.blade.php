@extends('layouts.admin', ['pageTitle' => 'new administrator'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Administrator Details</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.users.store')}}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-sm-2 control-label">Mobile (username)</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="mobile" minlength="11" maxlength="11" name="mobile" value="{{old('mobile')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-secondary" href="{{route('admin.users.index')}}">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
