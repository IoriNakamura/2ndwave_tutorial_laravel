@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    タイトル
                </div>
                <div class="col-md-8 border">
                    {{ $blog->title }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    内容
                </div>
                <div class="col-md-8 border">
                    {{ $blog->content }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    作成者
                </div>
                <div class="col-md-8 border">
                    {{ $blog->user ? $blog->user->name : '' }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    作成日
                </div>
                <div class="col-md-8 border">
                    {{ $blog->created_at }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    更新日
                </div>
                <div class="col-md-8 border">
                    {{ $blog->updated_at }}
                </div>
            </div> 
        </div>
    </div>
    
    <div class="mt-2" style="margin:10px; text-align: right;">
        @if ($user->id == $blog->created_user_id)
             <a href="/blogs/{{$blog->id}}/edit" class="btn btn-warning" style="display:inline margin-right: 100px">
                 編集
            </a>
            <form action="/blogs/{{$blog->id}}" style="display:inline" method='post'>
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        @endif
        <span> 
        <!-- ログインしているユーザーが作成したブログにはいいねを押させない　-->
        @if ($user->id == $blog->created_user_id)
            <a href="/nices/{{$blog->id}}"class="btn btn-success">
                👍    
                <span class="badge">
                    {{ $blog->nices->count() }}
                </span>
            </a>
        @else
            <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
            @if($nice)
            <!-- 「いいね」取消用ボタンを表示 -->
                <a href="{{ route('unnice', $blog) }}" class="btn btn-success">
                    👍
                    <!-- 「いいね」の数を表示 -->
                    <span class="badge">
                        {{ $blog->nices->count() }}
                    </span>
                </a>
            @else
            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                <a href="{{ route('nice', $blog) }}" class="btn btn-secondary">
                    👍
                    <!-- 「いいね」の数を表示 -->
                    <span class="badge">
                        {{ $blog->nices->count() }}
                    </span>
                </a>
            @endif
        @endif
        </span>
    </div>

    <form action="{{ route('comments.store') }}" method='post'>
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="col-md-4 border bg-info text-center">
                        コメント
                    </div>
                    <div class="col-md-8 border">
                        <textarea name='comment[content]' class="form-control" max='200'placeholder="コメントを入力" required='true'></textarea>
                    </div>
                    <div class="col-md-4 border bg-info text-center">
                        名前
                    </div>
                   <div class="col-md-8 border">
                        {{ $user->name }}
                        <input type='hidden' name="comment[commented_user_id]" class="form-control" value="{{ $user->id }}" required='true'>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2" style="margin:10px; text-align: right;">
            <div>
                <button type='submit' class='btn btn-success'>コメントする</button>
            </div>
        </div>
    </form>

    @if(!empty($blog_id))
        @foreach ($related_comments as $comment)
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 border bg-info text-center">
                            {{ $comment->user->name }}
                        </div>
                        <div class="col-md-8 border">
                            {{ $comment->content }}
                            @if ($user->id == $comment->commented_user_id)
                                <form action="/comments/{{$comment->id}}" method='post' style="text-align: right;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    {{-- <div class="mt-2" style="margin:10px; text-align: right;">
        <a href="/nices" onClick="history.back()" class='btn btn-info'>
            お気に入りに戻る
        </a>
        <a href="/blogs" onClick="history.back()" class='btn btn-info'>
            一覧に戻る
        </a>
        <a href="/mypages" class="btn btn-info">
            マイページに戻る
        </a> 
    </div> --}}
</div>
@endsection