<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/top-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">
    <title>Document</title>
</head>
<body id="body">
    <div class="side flex">
        @component("layouts.sideber")
        @endcomponent

        <div class="main">

            <form action="/" method="post" class="main_search flex"  accept-charset="UTF-8">
                @csrf
                <img src="/img/sagasu2.png" class="main_search_img" width="21px">
                <input type="text" name="text" id="searchText" placeholder="おすすめの料理">
                <button type="submit" onclick="searchPostList(event)">検索</button>
            </form>

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
                    <input id="tab01" type="radio" name="tab" class="tab-switch tab1" checked="checked">
                    <label
                        class="tab-label" for="tab01">
                        <a href="{{route('top')}}">すべて</a>
                    </label>
                    <div class="tab-content">
                        @if(isset($items))
                        @if(count($items))
                            @foreach($items as $item)
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
                            <p>結果がありません</p>    
                        @endif
                        @endif
                    </div>
                    <input id="tab02" type="radio" name="tab"class="tab-switch tab2">
                    <label class="tab-label" for="tab02">
                        <a href="{{route('tag_list',['id' => 1])}}">節約術</a>
                    </label>
                    <div class="tab-content">
                        @if(isset($items))
                        @foreach($items as $item)
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
                        @endif
                    </div>
                    <input id="tab03" type="radio" name="tab" class="tab-switch tab3">
                    <label class="tab-label" for="tab03">
                        <a href="{{route('tag_list',['id' => 2])}}">自炊</a>
                    </label>
                    <div class="tab-content">
                        @if(isset($items))
                        @foreach($items as $item)
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
                        @endif
                    </div>
                    <input id="tab04" type="radio" name="tab" class="tab-switch tab4">
                    <label class="tab-label" for="tab04">
                        <a href="{{route('tag_list',['id' => 3])}}">家事</a>
                    </label>
                    <div class="tab-content">
                        @if(isset($items))
                        @foreach($items as $item)
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
                        @endif
                    </div>
                    <input id="tab05" type="radio" name="tab" class="tab-switch tab5">
                    <label class="tab-label" for="tab05">
                        <a href="{{route('tag_list',['id' => 4])}}">防犯</a>
                    </label>
                    <div class="tab-content">
                        @if(isset($items))
                        @foreach($items as $item)
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
                        @endif
                    </div>
                    <input id="tab06" type="radio" name="tab" class="tab-switch tab6">
                    <label class="tab-label"for="tab06">
                        <a href="{{route('tag_list',['id' => 5])}}">防災</a>
                    </label>
                    <div class="tab-content">
                        @if(isset($items))
                        @foreach($items as $item)
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
                        @endif
                    </div>
                    <input id="tab07" type="radio" name="tab" class="tab-switch tab7">
                    <label class="tab-label"for="tab07">
                        <a href="{{route('tag_list',['id' => 6])}}">暮らし</a>
                    </label>
                    <div class="tab-content">
                        @if(isset($items))
                        @foreach($items as $item)
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
                        @endif
                    </div>
                    <input id="tab08" type="radio" name="tab" class="tab-switch tab8">
                    <label class="tab-label"for="tab08">
                        <a href="{{route('tag_list',['id' => 7])}}">支出管理</a>                        
                    </label>
                    <div class="tab-content">
                        @if(isset($items))
                        @foreach($items as $item)
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
                        @endif
                    </div>

                    <input id="tab09" type="radio" name="tab" class="tab-switch tab9">
                    <label class="tab-label"for="tab09">
                        <a href="{{route('tag_list',['id' => 8])}}">その他</a>                        
                    </label>
                    <div class="tab-content">
                        @if(isset($items))
                        @foreach($items as $item)
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/top.js"></script>

</body>

</html>
