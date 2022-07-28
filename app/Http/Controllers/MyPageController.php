<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $from = $request->input('from');
        $until = $request->input('until');
        $user = Auth::user();
        $user_name = $user->name;
        $user_id = $user->id;
        $query = Blog::query();

        if(!empty($keyword)) {
            $query->join('users', function ($join) use ($user_id) {
                $join->on('blogs.created_user_id', '=', 'users.id');
            })
            ->select('blogs.*', 'users.name')
            ->where (function ($query) use ($user_id) {
                $query->Where('users.id', 'LIKE', "%{$user_id}%");
            });
            $query->where (function ($query) use ($keyword) {
                $query->Where('blogs.id', 'LIKE', "%{$keyword}%")
                    ->orwhere('blogs.title', 'LIKE', "%{$keyword}%")
                    ->orWhere('blogs.content', 'LIKE', "%{$keyword}%");
            });
            if(!empty($from) && !empty($until)) {
                $query->where (function ($query) use ($from, $until) {
                    $query->WhereBetween('blogs.created_at', [$from, $until]);
                });
            }
        } else {
            $query->join('users', function ($join) use ($user_id) {
                $join->on('blogs.created_user_id', '=', 'users.id');
            })
            ->select('blogs.*', 'users.name')
            ->where (function ($query) use ($user_id) {
                $query->Where('users.id', 'LIKE', "%{$user_id}%");
            });
            if(!empty($from) && !empty($until)) {
                $query->where (function ($query) use ($from, $until) {
                    $query->WhereBetween('blogs.created_at', [$from, $until]);
                });
            }
        }
        $blogs = $query->sortable()->paginate(5);
        return view('mypages.index', compact('blogs', 'user_name', 'from', 'until', 'keyword', 'user'));
    }

    public function show($id, Request $request)
    {
        $user = User::find($id);
        $keyword = $request->input('keyword');
        $from = $request->input('from');
        $until = $request->input('until');
        $user_id = $user->id;
        $query = Blog::query();
        if(!empty($keyword)) {
            $query->join('users', function ($join) use ($user_id) {
                $join->on('blogs.created_user_id', '=', 'users.id');
            })
            ->select('blogs.*', 'users.name')
            ->where (function ($query) use ($user_id) {
                $query->Where('users.id', 'LIKE', "%{$user_id}%");
            });
            $query->where (function ($query) use ($keyword) {
                $query->Where('blogs.id', 'LIKE', "%{$keyword}%")
                    ->orwhere('blogs.title', 'LIKE', "%{$keyword}%")
                    ->orWhere('blogs.content', 'LIKE', "%{$keyword}%");
            });
            if(!empty($from) && !empty($until)) {
                $query->where (function ($query) use ($from, $until) {
                    $query->WhereBetween('blogs.created_at', [$from, $until]);
                });
            }
        } else {
            $query->join('users', function ($join) use ($user_id) {
                $join->on('blogs.created_user_id', '=', 'users.id');
            })
            ->select('blogs.*', 'users.name')
            ->where (function ($query) use ($user_id) {
                $query->Where('users.id', 'LIKE', "%{$user_id}%");
            });
            if(!empty($from) && !empty($until)) {
                $query->where (function ($query) use ($from, $until) {
                    $query->WhereBetween('blogs.created_at', [$from, $until]);
                });
            }
        }
        
        $blogs = $query->sortable()->paginate(5);
        return view('mypages.show', compact('user', 'blogs', 'from', 'until', 'keyword'));
    }
}
