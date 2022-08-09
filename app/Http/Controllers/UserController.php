<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
    }

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

        if ($data['password'] == $data['password_confirmation']) {

            $data['password'] = Hash::make($data['password']);
            $user->fill($data)->save();
            $this->success('messages.success.updated', ['name'=>'ユーザー']);
            return view ('users.index', compact('user'));   
        }
        
        $message = 'パスワードと確認用パスワードが一致しません';
        return view ('users.edit', compact('user', 'message'));
    }
}
