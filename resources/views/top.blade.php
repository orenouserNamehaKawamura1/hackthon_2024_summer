<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/top-style.css')}}">
    <title>Document</title>
</head>

<body>
    <div class="side flex">
        <div class="sidebar">
            <h1>Ideus</h1>
            <div class="side_content">
                <div class="flex search">
                    <div class="img">
                        <img src="/img/sagasu.png" alt="" width="100%">
                    </div>
                    <p>さがす</p>
                </div>
                <p id="login_p1">ログインしてideaをシェアしよう</p>
                <p id="login_p2"> ログインすると投稿やいいねなどの機能を利用できます</p>
                <p></p>
                <div class="flex login">
                    <div class="img">
                        <img src="/img/login.png" alt="" width="100%">
                    </div>

                    @if(Auth::check())
                        <a href="{{route('logout')}}"><p>ログアウト</p></a>
                    @else
                        <a href="{{route('home')}}"><p>ログイン</p></a>
                    @endif

                </div>
            </div>
        </div>

        <div class="main">

            <div class="main_search flex">
                <img src="/img/sagasu2.png" class="main_search_img" width="21px">
                <input type="text" placeholder="おすすめの料理">
                <button>検索</button>
            </div>

            <div class="radio-group">
                <div class="radio-area">
                    <input type="radio" name="rdo_bg" id="rdobg1" checked="">
                    <label for="rdobg1">お悩み</label>
                </div>
                <div class="radio-area">
                    <input type="radio" name="rdo_bg" id="rdobg2">
                    <label for="rdobg2">共有</label>
                </div>
            </div>
        </div>


    </div>
    <!-- 投稿一覧 -->
    <div>
        @if(isset($items))
            @foreach($items as $item)
                <div style="margin-bottom: 10px">
                    <a href="{{route('detail',['id' => $item->id])}}">{{$item->title}}</a>
                    <p>{{$item->description}}</p>
                    <p>{{$item->user->name}}</p>
                    <p>{{$item->good}}</p>
                </div>
            @endforeach
        @endif
    </div>
</body>

</html>
