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
        $user = Auth::user();
        $data['password'] = Hash::make($data['password']);    

        $user->update([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => $data['password'],
            'favorites' => $data['favorites'],
            'comment'   => $data['comment']
        ]);

        $this->success('messages.success.updated', ['name'=>'ユーザー']);
        return view ('users.index', compact('user'));
    }
}
