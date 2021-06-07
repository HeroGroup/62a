<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        try{
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return redirect('/admin/users')->with('message', 'User created successfully.')->with('type','success');
        } catch (\Exception $exception) {
            return back()->withInput()->with('message', $exception->getMessage())->with('type','danger');
        }
    }

    public function edit(User $user)
    {
        // $user = DB::table('users')->find($userId);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try{
            $user->update($request->all());
            return redirect('/admin/users')->with('message', 'User updated successfully.')->with('type','success');
        } catch (\Exception $exception) {
            return redirect('/admin/users')->with('message', $exception->getMessage())->with('type','danger');
        }
    }

    public function destroy($user)
    {
        // DB::table('users')->delete($user);
        return redirect('/admin/users')->with('message', 'Delete action is not permitted at this moment.')->with('type', 'danger');
    }

    public function resetPassword(User $user)
    {
        try {
            $user->update(['password' => Hash::make($user->mobile)]);

            return $this->success("password has been reset successfully. New password is user's mobile number");
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function changePassword(User $user)
    {
        return view('admin.users.profile', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        if (Hash::check($request->old_password, auth()->user()->password)) {
            if ($request->password == $request->password_confirmation) {
                auth()->user()->update(['password' => Hash::make($request->password)]);

                return back()->with('message', 'password updated successfully.')->with('type', 'success');
            } else {
                return back()->with('message', 'Password and password confirmation are not the same.')->with('type', 'danger');
            }
        } else {
            return back()->with('message', 'Current password is incorrect.')->with('type', 'danger');
        }
    }
}
