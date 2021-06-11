@extends('layouts.admin', ['pageTitle' => 'Edit Administrator', 'active' => 'administrators'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Administrator</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.users.update', $user->id)}}">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-sm-2 control-label">Mobile</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="mobile" minlength="11" maxlength="11" name="mobile" value="{{$user->mobile}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-primary" onclick="resetPassword()">reset password</button>
                        <a class="btn btn-secondary" href="{{route('admin.users.index')}}">cancel</a>
                        <button type="submit" class="btn btn-success">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function resetPassword(userId) {
            $.ajax("{{route('admin.users.resetPassword', $user->id)}}", {
                type: "get",
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        text: response.message,
                        timerProgressBar: true,
                        timer:5000
                    });
                }
            })
        }
    </script>
@endsection
