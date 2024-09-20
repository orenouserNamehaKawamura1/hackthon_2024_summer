@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"
            style="height: 100vh; width:100%; display:flex; align-items:center; justify-content:center ">
            <div class="card shadow h-auto" style="background-color:white;width:65%">
                <div class="text-center"
                    style="background: linear-gradient(90deg, rgba(255, 101, 101, 1), rgba(255, 214, 151, 1));-webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size:45px; margin-top:30px">
                    {{ __('Ideus') }}</div>
                <div style="text-align:center; font-size:20px;margin-bottom:30px">
                    {{ __('ログイン') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div style="display:flex; justify-content:center; margin-bottom:4%">
                            <div>
                                <label for="email" style="color:#A19B9B; font-size:12px">{{ __('メールアドレス') }}</label>

                                <div class="col-md-6" style="width:350px;">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

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

                                <div class="col-md-6" style="width: 350px;">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div style="margin-top:40px;margin-bottom:20px">
                            <div style="display:flex; justify-content:center;color:#4D4D4D;font-size:13px ">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label style="display:flex; justify-content:center;color:#A19B9B; font-size:13px"
                                    for="remember">
                                    {{ __('ログインしたままにする') }}
                                </label>
                            </div>
                        </div>

                        <div>
                            <div style="text-align:center">
                                <div>
                                    <button type="submit" class="btn"
                                        style="width:25%; border-color:#FA6B62; background-color:#FA6B62; color:white">
                                        {{ __('次へ') }}
                                    </button>
                                </div>

                                <div style="display:flex;justify-content:center; margin-top:6%">
                                    <div style="padding-right:30px">
                                        <a href="{{ route('register') }}"
                                            style="text-decoration: none; color:#A19B9B;font-size:0.9rem;">
                                            {{ __('新規登録') }}
                                        </a>
                                    </div>

                                    <div style="padding-left:30px">
                                        @if (Route::has('password.request'))
                                        <a style="text-decoration: none; color:#A19B9B;font-size:0.8rem;"
                                            href="{{ route('password.request') }}">
                                            {{ __('パスワードを忘れた方へ') }}
                                        </a>
                                        @endif
                                    </div>
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