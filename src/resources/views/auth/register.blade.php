@extends('layouts.guest')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="title">
            <h1>会員登録</h1>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- ユーザー名 --}}
            <div class="form-group">
                <label for="name">ユーザー名</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" novalidate autofocus>

                {{-- 個別エラー --}}
                @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>

            {{-- メールアドレス --}}
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input id="email" type="text" name="email" value="{{ old('email') }}" novalidate>

                @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>

            {{-- パスワード --}}
            <div class="form-group">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password"  autocomplete="new-password" novalidate>

                @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>

            {{-- 確認用パスワード --}}
            <div class="form-group">
                <label for="password_confirmation">パスワード確認</label>
                <input id="password_confirmation" type="password" name="password_confirmation" novalidate>

                @error('password_confirmation')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit">登録する</button>
        </form>

        <div style="margin-top: 20px; text-align: center;">
            <p><a href="{{ route('login') }}">ログインはこちら</a></p>
        </div>
    </div>
@endsection
