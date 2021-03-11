@extends('layouts.app')

@section('content')
<div class="card-header">ユーザー新規登録</div>
    @foreach($errors->all() as $error)
        <li><strong>{{ $error }}</strong></li>
    @endforeach

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name">ユーザーID</label>

            <div class="col-md-6">
                <input type="text" name="name" autocomplete="off">
            </div>
        </div>



        <div class="form-group row">
            <label for="display_name">ニックネーム</label>

            <div class="col-md-6">
                <input type="text" name="display_name" autocomplete="off">
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

            <div class="col-md-6">
                <input type="password" name="password" autocomplete="off">
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（確認用）</label>

            <div class="col-md-6">
                <input type="password" name="password_confirmation" autocomplete="off">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
            </div>
        </div>
    </form>
@endsection
