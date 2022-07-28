@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    ID
                </div>
                <div class="col-md-8 border">
                    {{ $user->id }}
                </div>
            </div>
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
                    メールアドレス
                </div>
                <div class="col-md-8 border">
                    {{ $user->email }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    パスワード
                </div>
                <div class="col-md-8 border">
                    安全のためパスワードは表示していません
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
                    プロフィール画像
                </div>
                <div class="col-md-8 border">
                    <label for="profile-image">
                    @if ($user->profile_image == null)
                        <img class="rounded-circle" src="{{ asset('default.jpeg') }}" alt="プロフィール画像" width="100" height="100">
                    @else
                        <img class="rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="100" height="100">
                    @endif
                    </label>
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
            <div class="row">
                <div class="col-md-4 border bg-info text-center">
                    更新日
                </div>
                <div class="col-md-8 border">
                    {{ $user->updated_at }}
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2" style="margin:10px; text-align: right;">
        <a href="/users/{{$user->id}}/edit" class="btn btn-warning">
            編集
        </a>
    </div>
</div>
@endsection