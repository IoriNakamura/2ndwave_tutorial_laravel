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
    
    <div class="mt-2">
        <a href="/blogs" class='btn btn-info'>
            一覧に戻る
        </a>
        <a href="/blogs/{{$blog->id}}/edit" class="btn btn-warning">
            編集
        </a>
        <form action="/blogs/{{$blog->id}}" method='post'>
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">削除</button>
        </form>
    </div>
    <form action="{{ route('comments.store') }}" method='post'>
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <input type="hidden" name="id" value="{{ $id }}">
                    @dump($id)
                    <div class="col-md-4 border bg-info text-center">
                        コメント
                    </div>
                    <div class="col-md-8 border">
                        <textarea name='comment[content]' class="form-control" max='200'></textarea>
                    </div>
                    <div class="row">
                    <div class="col-md-4 border bg-info text-center">
                        名前
                    </div>
                   <div class="col-md-8 border">
                        {{ $user->name }}
                        <input type='hidden' name='blog[created_user_id]' class="form-control" value="{{ $user->id }}" required='true'>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mt-2">
            <div>
                <button type='submit' class='btn btn-success'>コメントする</button>
            </div>
        </div>
    </form>
    @if(!empty($date))
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 border bg-info text-center">
                        コメント
                    </div>
                    <div class="col-md-8 border">
                        {{ $date->content }}
                    </div>
                    <div class="row">
                    <div class="col-md-4 border bg-info text-center">
                        名前
                    </div>
                    <div class="col-md-8 border">
                        {{ $date->commented_user_id }}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection