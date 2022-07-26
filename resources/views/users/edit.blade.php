@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/users/{{$user->id}}" method='post'>
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
                    <div class="col-md-4 border bg-info text-center">
                        パスワード
                    </div>
                    <div class="col-md-8 border">
                        <input type='text' name='user[password]' class="form-control" required='true' placeholder="パスワードは安全のため表示していません">
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