<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Nice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class NiceController extends Controller
{
    public function nice (Blog $blog, Request $request) {
        $nice=New Nice();
        $nice->blog_id = $blog->id;
        $nice->user_id = Auth::user()->id;
        $nice->save();
        return back(); 
    }

    public function unnice(Blog $blog, Request $request) {
        $user = Auth::user()->id;
        $nice = Nice::where('blog_id', $blog->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $from = $request->input('from');
        $until = $request->input('until');
        $user = Auth::user();
        $user_id = $user->id;
        $user_name = $user->name;
        
        $query = Blog::query();
        if(!empty($keyword)) {
            $query->join('nices', function ($join) {
                $join->on('blogs.id', '=', 'nices.blog_id');
            })
            ->select('blogs.*', 'nices.user_id')
            ->where (function ($query) use ($user_id) {
                $query->where('nices.user_id', 'LIKE', "%{$user_id}%");
            });
            $query->where(function ($query) use ($keyword){
                $query->Where('blogs.id', 'LIKE', "%{$keyword}%")
                    ->orWhere('blogs.title', 'LIKE', "%{$keyword}%")
                    ->orWhere('blogs.content', 'LIKE', "%{$keyword}%");
            });
            if(!empty($from) && !empty($until)) {
                $query->where (function ($query) use ($from, $until) {
                    $query->WhereBetween('blogs.created_at', [$from, $until]);
                });
            }
        } else {
            $query->join('nices', function ($join) {
                $join->on('blogs.id', '=', 'nices.blog_id');
            })
            ->select('blogs.*', 'nices.user_id')
            ->where (function ($query) use ($user_id) {
                $query->where('nices.user_id', 'LIKE', "%{$user_id}%");
            });
            if(!empty($from) && !empty($until)) {
                $query->where (function ($query) use ($from, $until) {
                    $query->WhereBetween('blogs.created_at', [$from, $until]);
                });
            }
        }

        $blogs = $query->sortable()->orderBy('blog_id')->paginate(5);

        return view('nices.index', compact('blogs', 'user_name', 'keyword', 'from', 'until'));
    }

    public function show($id) 
    {
        $blog = Blog::find($id);
        $query = Nice::query();
        $query->join('users', function ($join) {
            $join->on('nices.user_id', '=', 'users.id');
        })
        ->select('nices.*', 'users.name')
        ->where (function ($query) use ($id) {
            $query->Where('nices.blog_id', 'LIKE', "%{$id}%");
        });
        $users = $query->get();
        //dump($users);
        //die;
        return view('nices.show', compact('blog', 'users'));
    }
}
