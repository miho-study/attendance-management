@extends('layouts.guest')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login-container">

    {{-- タイトル --}}
    <div class="title">
        <h1>ログイン</h1>
    </div>

    {{-- ステータス表示 --}}
    @if(session('status'))
        <div class="alert">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- メールアドレス --}}
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input 
                id="email" 
                type="text" 
                name="email" 
                value="{{ old('email') }}"
            >
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- パスワード --}}
        <div class="form-group">
            <label for="password">パスワード</label>
            <input 
                id="password" 
                type="password" 
                name="password"
            >
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

                {{-- ログイン失敗メッセージ --}}
        @if ($errors->has('login'))
        <div class="error">{{ $errors->first('login') }}</div>
        @endif

        {{-- ログインボタン --}}
        <button type="submit">ログインする</button>
    </form>

    {{-- 会員登録リンク --}}
    <a href="{{ route('register') }}">会員登録はこちら</a>

</div>
@endsection
