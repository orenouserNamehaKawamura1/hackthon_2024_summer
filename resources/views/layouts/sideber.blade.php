<div class="sidebar">
    <h1>Ideus</h1>
    <div class="side_content">

        <div class="flex side_text">
            <div class="img">
                <img src="/img/sagasu.png" alt="" width="90%">
            </div>
            <a href="/">
                <p>さがす</p>
            </a>
        </div>

        <div class="flex">
            @if(Auth::check())
            <div>
                <div class="flex myPage side_text">
                    <div class="img">
                        <img src="/img/mypage.png" alt="" width="90%">
                    </div>
                    <a href="/myPage">
                        <p>マイページ</p>
                    </a>
                </div>
                <div class="flex addPost side_text">
                    <div class="img">
                        <img src="/img/toukou.png" alt="" width="90%">
                    </div>
                    <a href="/post">
                        <p>投稿</p>
                    </a>
                </div>
                <div class="flex login side_text">
                    <div class="img">
                        <img src="/img/login.png" alt="" width="90%">
                    </div>
                    <a href="{{route('logout')}}">
                        <p>ログアウト</p>
                    </a>
                </div>
            </div>

            @else
            <div class="login side_text">
                <p id="login_p1">ログインしてideaをシェアしよう</p>
                <p id="login_p2"> ログインすると投稿やいいねなどの機能を利用できます</p>
                <div class="flex">
                    <div class="img">
                        <img src="/img/login.png" alt="" width="90%">
                    </div>
                    <a href="{{route('home')}}">
                        <p>ログイン</p>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>