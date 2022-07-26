<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\Nice;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        $blog_id = ($id);
        $data = $request->comment;
        $blog = Blog::find($id);
        $users = User::query()->get();
        $query = Comment::query();
        $user = Auth::user();
        $nice=New Nice();
        $nice->blog_id = $blog->id;
        $nice->user_id = Auth::user()->id;
       
        Comment::create([
            'content'         => $data['content'],
            'commented_user_id' => $data['commented_user_id'],
            'blog_id'           => $id
        ]);
        $comments = Comment::all();

        if(!empty($comments)) {
            $query->where(function ($query) use ($id){
                $query->where('comments.blog_id', 'LIKE',"%{$id}%");
            });
        };

        $blog_id = $query->get();
        $related_comments = $query->get();

        return view('blogs.show', compact('blog','id', 'users', 'user' ,'blog_id','related_comments', 'nice'));
    }

    public function destroy($id) {
        
        $comment = Comment::find($id);
        $comment->delete();
        $blog = Blog::find($comment->blog_id);
        $user = Auth::user();
        $id = $comment->blog_id;
        $blog_id = $id;
        $query = Comment::query();
        $comments = Comment::all();
        if(!empty($comments)) {
            $query->where(function ($query) use ($blog_id){
                $query->where('comments.blog_id', 'LIKE',"%{$blog_id}%");
            });
        };
        $related_comments = $query->get();
        $nice=New Nice();
        $nice->blog_id = $blog->id;
        $nice->user_id = Auth::user()->id;

        return view('blogs.show', compact('blog', 'user', 'id', 'blog_id', 'related_comments','nice'));
    }
}
