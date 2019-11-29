<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function profile()
    {
        return view('admin.profile.index', ['title' => 'Update Profile', 'title2' => 'Update Password']);
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id . ',id'],
            'avatar' => ['nullable', 'file', 'mimes:jpeg,jpg,png,gif,png']
        ]);

        $user = User::find(Auth::user()->id);
        $avatar = $user->avatar;
        if ($request->hasFile('avatar')) {
            $avatar = $this->saveImage($request->avatar);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = $avatar;
        $user->save();

        return redirect()->route('admin.profile')->with(
            'flash_message',
            'Profile updated successfully.'
        );
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->password = $request->password;
        $user->save();

        return redirect()->route('admin.profile')->with(
            'flash_message',
            'Password updated successfully.'
        );
    }
}
