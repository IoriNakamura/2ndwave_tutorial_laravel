@extends('layouts.app')

@section('content')
<div class="container">
    <form action='/blogs' method='post'>
        <div class="row justify-content-center">
            @csrf
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 border bg-info text-center">
                        タイトル
                    </div>
                    <div class="col-md-8 border">
                        <input type='text' name='blog[title]' class="form-control" max='20' placeholder="タイトルを入力" required='true' >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 border bg-info text-center">
                        内容
                    </div>
                    <div class="col-md-8 border">
                        <textarea name='blog[content]' class="form-control" max='200' required='true'></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 border bg-info text-center">
                        作成者
                    </div>
                    <div class="col-md-8 border text-center">
                        {{ $user->name }}
                        <input type='hidden' name='blog[created_user_id]' class="form-control" value="{{ $user->id }}" required='true'>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mt-2">
            <div class="me-2">
                <button type="button"onClick="history.back()" class="btn btn-info">戻る</button>
            </div>
            <div>
                <button type='submit' class='btn btn-success'>保存する</button>
            </div>
        </div>
    </form>
</div>
@endsection