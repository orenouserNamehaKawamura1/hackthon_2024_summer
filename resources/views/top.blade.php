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
                    <a href="{{route('logout')}}">
                        <p>ログアウト</p>
                    </a>
                    @else
                    <a href="{{route('home')}}">
                        <p>ログイン</p>
                    </a>
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
                    <label for="rdobg1">質問</label>
                </div>
                <div class="radio-area">
                    <input type="radio" name="rdo_bg" id="rdobg2">
                    <label for="rdobg2">共有</label>
                </div>
            </div>

            <!-- 投稿一覧 -->
            <div>
                <div class="tab-wrap">
                    <input id="tab01" type="radio" name="tab" class="tab-switch tab1" checked="checked"><label
                        class="tab-label" for="tab01">すべて</label>
                    <div class="tab-content">
                        コンテンツ 1
                    </div>
                    <input id="tab02" type="radio" name="tab" class="tab-switch tab2"><label class="tab-label"
                        for="tab02">節約術</label>
                    <div class="tab-content">
                        コンテンツ 2
                    </div>
                    <input id="tab03" type="radio" name="tab" class="tab-switch tab3"><label class="tab-label"
                        for="tab03">自炊</label>
                    <div class="tab-content">
                        コンテンツ 3
                    </div>
                    <input id="tab04" type="radio" name="tab" class="tab-switch tab4"><label class="tab-label"
                        for="tab04">家事</label>
                    <div class="tab-content">
                        コンテンツ 4
                    </div>
                    <input id="tab05" type="radio" name="tab" class="tab-switch tab5"><label class="tab-label"
                        for="tab05">防犯</label>
                    <div class="tab-content">
                        コンテンツ 5
                    </div>
                    <input id="tab06" type="radio" name="tab" class="tab-switch tab6"><label class="tab-label"
                        for="tab06">防災</label>
                    <div class="tab-content">
                        コンテンツ 6
                    </div>
                    <input id="tab07" type="radio" name="tab" class="tab-switch tab7"><label class="tab-label"
                        for="tab07">暮らし</label>
                    <div class="tab-content">
                        コンテンツ 7
                    </div>
                    <input id="tab08" type="radio" name="tab" class="tab-switch tab8"><label class="tab-label"
                        for="tab08">支出管理</label>
                    <div class="tab-content">
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

                    <input id="tab09" type="radio" name="tab" class="tab-switch tab9"><label class="tab-label"
                        for="tab09">その他</label>
                    <div class="tab-content">
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
                </div>

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
        </div>
    </div>
    <script src="/js/top.js"></script>

</body>

</html>