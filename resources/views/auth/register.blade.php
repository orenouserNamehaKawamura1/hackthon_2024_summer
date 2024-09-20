@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center;">
        <div class="col-md-8"
            style="height: 100vh; width:100%; display:flex; align-items:center; justify-content:center ">
            <div class="card shadow" style="background-color:white; width:65%;">
                <div class="text-center"
                    style="background: linear-gradient(90deg, rgba(255, 101, 101, 1), rgba(255, 214, 151, 1));-webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size:45px; margin-top:30px">
                    {{ __('Ideus') }}</div>
                <div style="text-align:center; font-size:20px">{{ __('サインアップ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3" style="display:flex; justify-content:center">
                            <div>
                                <label for="name" style="color:#A19B9B; font-size:12px">{{ __('ユーザー名') }}</label>

                                <div class="col-md-6" style="width:350px;">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3" style="display:flex; justify-content:center">
                            <div>
                                <label for="email" style="color:#A19B9B; font-size:12px">{{ __('メールアドレス') }}</label>

                                <div class="col-md-6" style="width:350px">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3" style="display:flex; justify-content:center">
                            <div>
                                <label for="password" style="color:#A19B9B; font-size:12px">{{ __('パスワード') }}</label>

                                <div class="col-md-6" style="width:350px">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="inputCheckbox" style="color:#A19B9B; font-size:11px; margin-top:5px; display:flex;
                                        align-items:center;"><input id="inputCheckbox" type="checkbox"
                                        style="display:flex; align-items:center; accent-color:#A19B9B">
                                    パスワードを表示する</label>
                            </div>
                        </div>

                        <div class="mb-3" style="display:flex; justify-content:center">
                            <div>
                                <label for="password-confirm"
                                    style="color:#A19B9B; font-size:12px">{{ __('パスワードの再入力') }}</label>

                                <div class="col-md-6" style="width:350px">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <label for="inputCheckbox2" style="color:#A19B9B; font-size:11px; margin-top:5px; display:flex;
                                        align-items:center;"><input id="inputCheckbox2" type="checkbox"
                                        style="display:flex; align-items:center; accent-color:#A19B9B">
                                    パスワードを表示する</label>
                            </div>
                        </div>

                        <div style="margin-top:30px">
                            <div class="text-center">
                                <div>
                                    <button type="submit" class="btn"
                                        style="width:20%; border-color:#FA6B62; background-color:#FA6B62; color:white">

                                        {{ __('登録へ') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection