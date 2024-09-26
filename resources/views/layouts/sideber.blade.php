<div class="sidebar">
    <h1>Ideus</h1>
    <div class="side_content">
        @if(isset($user))
        <p class="midiumtext">{{$user->name}}</p>
        @endif

        <div>
            @if(Auth::check())
            <div class="side_outside">
                <div class="flex side_text">
                    <div class="img">
                        <img src="/img/sagasu.png" alt="" width="90%">
                    </div>
                    <a href="/">さがす </a>
                </div>
                <div class="flex myPage side_text">
                    <div class="img">
                        <img src="/img/mypage.png" alt="" width="90%">
                    </div>
                    <a href="/myPage">マイページ</a>
                </div>
                <div class="flex addPost side_text">
                    <div class="img">
                        <img src="/img/toukou.png" alt="" width="90%">
                    </div>
                    <a href="/post">投稿</a>
                </div>
                <div class="flex login side_text">
                    <div class="img">
                        <img src="/img/login.png" alt="" width="90%">
                    </div>
                    <a href="{{route('logout')}}">ログアウト</a>
                </div>
            </div>

            @else
            <div class="login side_text">
                <div class="flex side_text">
                    <div class="img">
                        <img src="/img/sagasu.png" alt="" width="90%">
                    </div>
                    <a href="/">さがす</a>
                </div>
                <p id="login_p1">ログインしてideaをシェアしよう</p>
                <p id="login_p2"> ログインすると投稿やいいねなどの機能を利用できます</p>
                <div class="flex">
                    <div class="img">
                        <img src="/img/login.png" alt="" width="90%">
                    </div>
                    <a href="{{route('home')}}">ログイン</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>