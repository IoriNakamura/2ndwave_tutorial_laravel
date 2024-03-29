@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/users/{{$user->id}}" method='post'enctype="multipart/form-data">
        @method('PUT')
        @csrf 
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 border bg-info text-center">
                        名前
                    </div>
                    <div class="col-md-8 border">
                        <input type='text' name='user[name]' class="form-control" required='true' value="{{ $user->name }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 border bg-info text-center">
                        メールアドレス
                    </div>
                    <div class="col-md-8 border">
                        <input type='text' name='user[email]' class="form-control" required='true' value="{{ $user->email }}">
                    </div>
                </div>
                <div class="row">
                    <label for="password" class="col-md-4 border bg-info text-center">{{ __('パスワード') }}</label>

                    <div class="col-md-8 border">
                        @if (!empty($message))
                            <input id="password" type="password" class="form-control" name="user[password]" placeholder="{{$message}}">
                        @else
                            <input id="password" type="password" class="form-control" name="user[password]" >
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label for="password-confirm" class="col-md-4 border bg-info text-center">{{ __('確認用パスワード') }}</label>

                    <div class="col-md-8 border">
                        <input id="password-confirm" type="password" class="form-control" name="user[password_confirmation]">
                    </div>
                </div>
                @if($user->favorites != null)
                    <div class="row">
                        <div class="col-md-4 border bg-info text-center">
                            好きなもの・趣味
                        </div>
                        <div class="col-md-8 border">
                            <input type='text' name='user[favorites]' class="form-control"  value="{{ $user->favorites }}">
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-4 border bg-info text-center">
                            好きなもの・趣味
                        </div>
                        <div class="col-md-8 border">
                            <input type='text' name='user[favorites]' class="form-control" placeholder="未記入">
                        </div>
                    </div>
                @endif
                @if($user->comment != null )
                    <div class="row">
                        <div class="col-md-4 border bg-info text-center">
                            ひとこと
                        </div>
                        <div class="col-md-8 border">
                            <input type='text' name='user[comment]' class="form-control"  value="{{ $user->comment }}">
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-4 border bg-info text-center">
                            ひとこと
                        </div>
                        <div class="col-md-8 border">
                            <input type='text' name='user[comment]' class="form-control"  placeholder="未記入">
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4 border bg-info text-center">
                        プロフィール画像
                    </div>
                    <div class="col-md-8 border">
                        <label for="profile-image">
                            @if ($user->profile_image === null)
                                <img class="rounded-circle" src="{{ asset('default.jpeg') }}" alt="プロフィール画像" width="100" height="100">
                            @else
                                <img class="rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="100" height="100">
                            @endif
                            <input id="profile-image" name="profile_image" type="file" class="form-control @error('profile-image') is-invalid @enderror" style="display:none;" value="" accept="image/png, image/jpeg">
                        </label>
                        @error('profile-image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2" style="margin:10px; text-align: right;">
            <div>
                <button type='submit' class='btn btn-success'>保存する</button>
            </div>
        </div>
    </form>
</div>
@endsection