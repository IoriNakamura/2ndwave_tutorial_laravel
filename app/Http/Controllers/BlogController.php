<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use App\Models\User;
use App\Models\Nice;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->session()->regenerate();

        $keyword = $request->input('keyword');
        $from = $request->input('from');
        $until = $request->input('until');
        $query = Blog::query();
        $user = Auth::user();        
        

        if(!empty($keyword)) {

            $query->join('users', function ($join) use ($keyword) {
                $join->on('blogs.created_user_id', '=', 'users.id');
            })
            ->select('blogs.*', 'users.name')
            ->where (function ($query) use ($keyword) {
                $query->Where('users.name', 'LIKE', "%{$keyword}%")
                ->orWhere('blogs.id', 'LIKE', "%{$keyword}%")
                ->orwhere('blogs.title', 'LIKE', "%{$keyword}%")
                ->orWhere('blogs.content', 'LIKE', "%{$keyword}%");
            });

            if(!empty($from) && !empty($until)) {
                $query->where (function ($query) use ($from, $until) {
                    $query->WhereBetween('blogs.created_at', [$from, $until]);
                });
            }
        } else {
            if(!empty($from) && !empty($until)) {
                $query->where (function ($query) use ($from, $until) {
                    $query->WhereBetween('blogs.created_at', [$from, $until]);
                });
            }
        }

        
        $blogs = $query->sortable()->paginate(5);
        //dump($blogs);
        //die;

        session()->push('message', 'ブログを登録しました。');
        
        $message = session()->get('message');
        
        session()->forget('message');

        return view('blogs.index', compact('blogs', 'keyword', 'from', 'until', 'user'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        $users = User::query()->get();
        $query = Comment::query();
        $query->join('users', 'comments.commented_user_id', '=', 'users.id')
                ->select('comments.*', 'users.profile_image')
                ->get();
        $comments = Comment::all();
        $user = Auth::user();
        $nice = Nice::where('blog_id', $blog->id)->where('user_id', auth()->user()->id)->first();

        
        if(!empty($comments)) {
            $query->where(function ($query) use ($id){
                $query->where('comments.blog_id', 'LIKE',"%{$id}%");
            });
        };

        $blog_id = $query->get();

        $related_comments = $query->get();

        return view('blogs.show', compact('blog', 'users', 'user', 'id', 'blog_id', 'related_comments', 'nice'));
    }

    public function create()
    {
        $user = Auth::user();
      
        return view('blogs.create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->blog;

        Blog::create([
           'title'           => $data['title'],
           'content'         => $data['content'],
           'created_user_id' => $data['created_user_id'],
        ]);

        $this->success('messages.success.created',['name' => 'ブログ']);

        return redirect('mypages');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $user = Auth::user();

        return view('blogs.edit', compact('blog',  'user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->blog;
        $blog = Blog::find($id);
        
        $blog->update([

            'title'           => $data['title'],
            'content'         => $data['content'],
            'created_user_id' => $data['created_user_id'],
        ]);

        $this->success('messages.success.updated', ['name' => 'ブログ']);
        return redirect ("blogs/$blog->id");
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        $this->success('messages.success.deleted', ['name' => 'ブログ']);

        return redirect('mypages');
    }

}