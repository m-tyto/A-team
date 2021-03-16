@extends('layouts.app')

@section('content')

<div class="card-header">ログイン</div>

@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
          
        <label>ユーザーID</label>

        <div class="col-md-6">
            <input type="text" name="name" autocomplete="off">
        </div>
       
        <label>パスワード</label>
        <div class="col-md-6">
            <input type="password" name="password">
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input type="checkbox" name="remember">

                    <label class="form-check-label" for="remember">
                        ログイン情報を保持する
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <input type="submit" value="ログイン">

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</div>

@endsection
