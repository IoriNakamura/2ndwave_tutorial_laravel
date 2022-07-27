@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{$user->name}}のページ</h1>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    名前
                </div>
                <div class="col-md-8 border">
                    {{ $user->name }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    好きなもの・趣味
                </div>
                <div class="col-md-8 border">
                    {{ $user->favorites }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    ひとこと
                </div>
                <div class="col-md-8 border">
                    {{ $user->comment }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    お問い合わせ
                </div>
                <div class="col-md-8 border">
                    {{ $user->email }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    登録日
                </div>
                <div class="col-md-8 border">
                    {{ $user->created_at }}
                </div>
            </div>
            <div>
                <form action="{{ route('mypages.index') }}" method="GET">
                    <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ $keyword  ?? null }}">
                    <br>
                    <input type="date" name="from" value="{{ $from }}">
                    ~
                    <input type="date" name="until" value="{{ $until }}">
                    <input type="submit" value="検索">
                </form>
            </div>
            <a href="/blogs/create" class="float-end">
                <button class="btn btn-success">新規登録</button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">@sortablelink('id', '#')</th>
                        <th scope="col" class="w-15">タイトル</th>
                        <th scope="col" class="w-auto">内容</th>
                        <th scope="col" class="w-10">作成者</th>
                        <th scope="col" class="w-15">作成日</th>
                        <th scope="col" class="w-15">更新日</th>
                        <th scope="col" class="w-15"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $blog->id }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->content }}</td>
                            <td>{{ $blog->user ? $blog->user->name : '' }}</td>
                            <td>{{ $blog->created_at }}</td>
                            <td>{{ $blog->updated_at }}</td>
                            <td>
                                <a href="/blogs/{{$blog->id}}">
                                    <button class="btn btn-primary">詳細</button>
                                </a>
                                <a href="/blogs/{{$blog->id}}" class="btn btn-secondary disabled">
                                    👍
                                    <!-- 「いいね」の数を表示 -->
                                    <span class="badge">
                                        {{ $blog->nices->count() }}
                                    </span>
                                    📝
                                    <!-- 「コメント」の数を表示 -->
                                    <span class="badge">
                                        {{ $blog->comments->count() }}
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {{ $blogs->appends(request()->query())->links() }} 
        </div>
    </div>
</div>
@endsection