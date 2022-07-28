@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{$user->name}}のページ</h1>
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
        <h2>
            <label for="profile-image">
                @if ($user->profile_image === null)
                    <img class="rounded-circle " src="{{ asset('default.jpeg') }}" alt="プロフィール画像" width="60" height="60">
                @else
                    <img class="rounded-circle " src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="60" height="60">
                @endif
            </label>
            プロフィール
        </h2>
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
                @if($user->favorites != null)
                    <div class="col-md-8 border">
                        {{ $user->favorites }}
                    </div>
                @else
                    <div class="col-md-8 border">
                        未記入
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    ひとこと
                </div>
                @if($user->comment != null)
                    <div class="col-md-8 border">
                        {{ $user->comment }}
                    </div>
                @else
                    <div class="col-md-8 border">
                        未記入
                    </div>
                @endif
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
    </div>
</div>
@endsection