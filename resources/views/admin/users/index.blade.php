@extends('layouts.admin', ['pageTitle' => 'Administrators', 'newButton' => true, 'newButtonUrl' => 'users/create', 'newButtonText' => 'new admin', 'active' => 'administrators'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Administrators</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Registered date</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{date('Y-m-d', strtotime($user->created_at))}}</td>
                            @component('components.links')
                                @slot('routeEdit'){{route('admin.users.edit',$user->id)}}@endslot
                                @slot('itemId'){{$user->id}}@endslot
                                @slot('routeDelete'){{route('admin.users.destroy',$user->id)}}@endslot
                            @endcomponent
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
