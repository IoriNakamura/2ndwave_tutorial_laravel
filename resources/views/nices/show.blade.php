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
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    いいねしたユーザー 
                </div>
                    <div class="col-md-8 border">
                        @foreach($users as $user)
                            {{ $user->name }}
                            <br>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection