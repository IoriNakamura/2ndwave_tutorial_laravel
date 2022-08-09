<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view ('users.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view ('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->user;
        if ($request->profile_image != null) {
            $profileImagePath = $request->profile_image->store('public/profiles');
            $data['profile_image'] = $profileImagePath;
        }
        $user = Auth::user();
        $data['password'] = Hash::make($data['password']);
        $user->fill($data)->save();
        $this->success('messages.success.updated', ['name'=>'ユーザー']);
        return view ('users.index', compact('user'));
    }
}
