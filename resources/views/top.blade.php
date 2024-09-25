<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/top-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <label for="rdobg1">
                        質問
                    </label>
                </div>
                <div class="radio-area">
                    <input type="radio" name="rdo_bg" id="rdobg2">
                    <label for="rdobg2">
                        共有
                    </label>
                </div>
            </div>

            <!-- 投稿一覧 -->
            <div class>
                <div class="tab-wrap">
                    <input id="tab01" type="radio" name="tab" class="tab-switch tab1" checked="checked">
                    <label
                        class="tab-label" for="tab01">
                        すべて
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
                            <div class = "page">
                                {{$items -> links('vendor.pagination.bootstrap-4')}}
                            </div>
                            @else
                                <p>Not data</p>    
                            @endif
                        @endif
                    </div>
                    <input id="tab02" type="radio" name="tab"class="tab-switch tab2">
                    <label class="tab-label" for="tab02">
                        節約術
                    </label>
                    <div class="tab-content">
                        @if(isset($eco_items))
                        @foreach($eco_items as $item)
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
                    </div>
                    <input id="tab03" type="radio" name="tab" class="tab-switch tab3">
                    <label class="tab-label" for="tab03">
                        自炊
                    </label>
                    <div class="tab-content">
                        @if(isset($cook_items))
                        @foreach($cook_items as $item)
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
                    </div>
                    <input id="tab04" type="radio" name="tab" class="tab-switch tab4">
                    <label class="tab-label" for="tab04">
                        家事
                    </label>
                    <div class="tab-content">
                        @if(isset($work_items))
                        @foreach($work_items as $item)
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
                    </div>
                    <input id="tab05" type="radio" name="tab" class="tab-switch tab5">
                    <label class="tab-label" for="tab05">
                       防犯
                    </label>
                    <div class="tab-content">
                        @if(isset($security_items))
                        @foreach($security_items as $item)
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
                    </div>
                    <input id="tab06" type="radio" name="tab" class="tab-switch tab6">
                    <label class="tab-label"for="tab06">
                        防災
                    </label>
                    <div class="tab-content">
                        @if(isset($disaster_items))
                        @foreach($disaster_items as $item)
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
                    </div>
                    <input id="tab07" type="radio" name="tab" class="tab-switch tab7">
                    <label class="tab-label"for="tab07">
                        暮らし
                    </label>
                    <div class="tab-content">
                        @if(isset($life_items))
                        @foreach($life_items as $item)
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
                    </div>
                    <input id="tab08" type="radio" name="tab" class="tab-switch tab8">
                    <label class="tab-label"for="tab08">
                        支出管理                        
                    </label>
                    <div class="tab-content">
                        @if(isset($manegement_items))
                        @foreach($manegement_items as $item)
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
                    </div>

                    <input id="tab09" type="radio" name="tab" class="tab-switch tab9">
                    <label class="tab-label"for="tab09">
                        その他                        
                    </label>
                    <div class="tab-content">
                        @if(isset($other_items))
                        @foreach($other_items as $item)
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
                    </div>
                </div>
            </div>

            <!-- 共有の一覧 -->
            <div>
                <div class="tab-wrap-share">
                    <!-- <input id="tab01" type="radio" name="tab" class="tab-switch tab1" checked="checked">
                    <label
                        class="tab-label-share" for="tab01">
                        すべて
                    </label> -->
                    <div class="tab-content-share">
                        @if(isset($share_items))
                            @if(count($share_items))
                                @foreach($share_items as $item)
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
                            <div class = "page">
                                <!-- {{$items -> links('vendor.pagination.bootstrap-4')}} -->
                            </div>
                            @else
                                <p>Not data</p>    
                            @endif
                        @endif
                    </div>
                    <!-- <input id="tab02" type="radio" name="tab"class="tab-switch tab2">
                    <label class="tab-label-share" for="tab02">
                        節約術
                    </label> -->
                    <div class="tab-content-share">
                        @if(isset($share_eco_items))
                        @foreach($share_eco_items as $item)
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
                    </div>
                    <!-- <input id="tab03" type="radio" name="tab" class="tab-switch tab3">
                    <label class="tab-label-share" for="tab03">
                        自炊
                    </label> -->
                    <div class="tab-content-share">
                        @if(isset($share_cook_items))
                        @foreach($share_cook_items as $item)
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
                    </div>
                    <!-- <input id="tab04" type="radio" name="tab" class="tab-switch tab4">
                    <label class="tab-label-share" for="tab04">
                        家事
                    </label> -->
                    <div class="tab-content-share">
                        @if(isset($share_work_items))
                        @foreach($share_work_items as $item)
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
                    </div>
                    <!-- <input id="tab05" type="radio" name="tab" class="tab-switch tab5">
                    <label class="tab-label-share" for="tab05">
                       防犯
                    </label> -->
                    <div class="tab-content-share">
                        @if(isset($share_security_items))
                        @foreach($share_security_items as $item)
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
                    </div>
                    <!-- <input id="tab06" type="radio" name="tab" class="tab-switch tab6">
                    <label class="tab-label-share"for="tab06">
                        防災
                    </label> -->
                    <div class="tab-content-share">
                        @if(isset($share_disaster_items))
                        @foreach($share_disaster_items as $item)
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
                    </div>
                    <!-- <input id="tab07" type="radio" name="tab" class="tab-switch tab7">
                    <label class="tab-label-share"for="tab07">
                        暮らし
                    </label> -->
                    <div class="tab-content-share">
                        @if(isset($share_life_items))
                        @foreach($share_life_items as $item)
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
                    </div>
                    <!-- <input id="tab08" type="radio" name="tab" class="tab-switch tab8">
                    <label class="tab-label-share"for="tab08">
                        支出管理                        
                    </label> -->
                    <div class="tab-content-share">
                        @if(isset($share_manegement_items))
                        @foreach($share_manegement_items as $item)
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
                    </div>

                    <!-- <input id="tab09" type="radio" name="tab" class="tab-switch tab9">
                    <label class="tab-label-share"for="tab09">
                        その他                        
                    </label> -->
                    <div class="tab-content-share">
                        @if(isset($share_other_items))
                        @foreach($share_other_items as $item)
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/top.js"></script>

</body>

</html>
