<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/top-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/mypage-style.css')}}">
</head>

<body id="body">
    <div class="side flex" id="myPage">
        @component("layouts.sideber")
        @endcomponent
        <div class="main">


            <div class="main_p_tag">
                @foreach($comments as $comment)
                <p id="main_p1">{{$comment->user->name}}</p>
                @endforeach
                <p id="main_p2">プロフィール</p>
            </div>

            <div>
                <div class="tab-wrap">
                    <input id="tab01" type="radio" name="tab" class="tab-switch tab1" checked="checked">
                    <label class="tab-label" for="tab01">
                        投稿
                    </label>
                    <div class="tab-content tab-content-on">
                        @if(isset($posts))
                        @if(count($posts))
                        @foreach($posts as $item)
                        <div class="post">
                            <a href="{{route('detail',['id' => $item->id])}}" class="post_a">{{$item->title}}</a>
                            <p id="post_p_1">{{$item->description}}</p>
                            <div class="post_p_2 flex">
                                <p>{{$item->user->name}}</p>
                                <img src="/img/hart.png" width="2.5%" height="2.5%">
                                <p>{{$item->good}}</p>
                            </div>
                            <a href="/edit/{{$item->id}}" id="a_edit">編集する</a>
                        </div>
                        @endforeach

                        @else
                        <p>Not data</p>
                        @endif
                        @endif
                    </div>
                    <input id="tab02" type="radio" name="tab" class="tab-switch tab2">
                    <label class="tab-label" for="tab02">
                        いいね
                    </label>
                    <div class="tab-content">
                        @if(isset($goods))
                        @if(count($goods))
                        @foreach($goods as $item)
                        <div class="post">
                            <a href="{{route('detail',['id' => $item->id])}}" class="post_a">{{$item->title}}</a>
                            <p id="post_p_1">{{$item->description}}</p>
                            <div class="post_p_2 flex">
                                <p>{{$item->user->name}}</p>
                                <img src="/img/hart.png" width="2.5%" height="2.5%">
                                <p>{{$item->good}}</p>
                            </div>
                        </div>
                        @endforeach

                        @else
                        <p>Not data</p>
                        @endif
                        @endif
                    </div>
                    <input id="tab03" type="radio" name="tab" class="tab-switch tab3">
                    <label class="tab-label" for="tab03">
                        コメント
                    </label>
                    <div class="tab-content">
                        @if(isset($comments))
                        @if(count($comments))
                        @foreach($comments as $item)
                        <div class="post">
                            <a href="{{route('detail',['id' => $item->id])}}" class="post_a">{{$item->title}}</a>
                            <p id="post_p_1">{{$item->description}}</p>
                            <div class="post_p_2 flex">
                                <p>{{$item->user->name}}</p>
                                <img src="/img/hart.png" width="2.5%" height="2.5%">
                                <p>{{$item->good}}</p>
                            </div>
                        </div>
                        @endforeach

                        @else
                        <p>Not data</p>
                        @endif
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<script src="/js/myPage.js"></script>

</html>