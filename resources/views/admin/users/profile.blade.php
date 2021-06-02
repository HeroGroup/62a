@extends('layouts.admin', ['pageTitle' => $user->name.' Profile'])
@section('content')
  <div class="row">
    <div class="col-lg-6">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
          </div>
          <div class="card-body">
            {!! Form::model($user, array('route' => array('admin.users.update', $user), 'method' => 'PUT')) !!}
              <div class="form-group row">
                  <label for="name" class="col-sm-4 control-label">Name</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="email" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="mobile" class="col-sm-4 control-label">Mobile</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="mobile" minlength="11" maxlength="11" name="mobile" value="{{$user->mobile}}" required>
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-sm-12 text-right">
                      <button type="button" class="btn btn-primary" onclick="resetPassword()">reset password</button>
                      <button type="submit" class="btn btn-success">submit</button>
                  </div>
              </div>
            {{ Form::close() }}
          </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
          </div>
          <div class="card-body">
              <form method="post" action="{{route('admin.users.updatePassword')}}">
                    @csrf
                  <div class="form-group row">
                      <label for="old_password" class="col-sm-4 control-label">Current Password</label>
                      <div class="col-sm-8">
                          <input type="password" class="form-control" id="old_password" name="old_password" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="password" class="col-sm-4 control-label">New Password</label>
                      <div class="col-sm-8">
                          <input type="password" class="form-control" id="password" name="password" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="password_confirmation" class="col-sm-4 control-label">Confirm Password</label>
                      <div class="col-sm-8">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-12 text-right">
                          <button type="submit" class="btn btn-success">submit</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
  <script>
      function resetPassword() {
          $.ajax("{{route('admin.users.resetPassword', $user->id)}}", {
              type: "get",
              success: function(response) {
                  const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      iconColor: 'white',
                      customClass: {
                          popup: 'colored-toast'
                      },
                      showConfirmButton: false,
                      timer: 7000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                  });
                  Toast.fire({
                      icon: 'success',
                      title: response.message
                  });
              }
          })
      }
  </script>
@endsection
