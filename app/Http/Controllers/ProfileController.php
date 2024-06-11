<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {   
        if ($request->newPassword != $request->confirmPassword) {
            return back()->with('error','New password is not the same as the confirm password');
        } elseif (Hash::check($request->currentPassword,auth()->guard('admin')->user()->password)) {
            $admin = Admin::find(auth()->guard('admin')->id);
            $admin->password = Hash::make($request->newPassword);
            $admin->save();
            return back()->with('success','Password Sucessfully update');
        } else {
            return back()->with('error','Current password invalid!');
        }
    }
}
