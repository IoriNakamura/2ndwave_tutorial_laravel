@extends('layouts.app')


@section('content')
@if (session()->has('messages'))
    @foreach (session()->pull('messages') as $type => $messages)
        <div class="alert alert-dismissible alert-{{ $type }}" role="alert">
            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
            <ul>
                @foreach($messages as $message)
                    <li>{!! $message !!}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>ブログ一覧</h1>
            <div>
                <form action="{{ route('blogs.index') }}" method="GET">
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
                            @if (!empty($keyword))
                                <td>{{  $blog->name }}</td>
                            @else
                                <td>{{ $blog->user ? $blog->user->name : '' }}</td>
                            @endif
                            <td>{{ $blog->created_at }}</td>
                            <td>{{ $blog->updated_at }}</td>
                            <td>
                                <a href="/blogs/{{$blog->id}}" class="btn btn-primary" style="display:inline margin-right: 100px">
                                    詳細
                                </a>
                                <a href="/blogs/{{$blog->id}}" class="btn btn-success">   
                                    👍
                                    <!-- 「いいね」の数を表示 -->
                                    <span class="badge">
                                        {{ $blog->nices->count() }}
                                    </span>
                                </a> 
                                <a href="/blogs/{{$blog->id}}" class="btn btn-info">
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