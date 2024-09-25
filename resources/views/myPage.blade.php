<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">

</head>
<body>
    <h1>ここはmypageです</h1>
    @component("layouts.sideber")
    @endcomponent
<h2>投稿一覧</h2>

<div class="tab-content">
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
            </div>
            @endforeach
            <div class = "page">
            {{$posts -> links('vendor.pagination.bootstrap-4')}}
        </div>
        @else
            <p>Not data</p>    
        @endif
    @endif
</div>
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
            <div class = "page">
            {{$goods -> links('vendor.pagination.bootstrap-4')}}
        </div>
        @else
            <p>Not data</p>    
        @endif
    @endif
</div>
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
            <div class = "page">
            {{$comments -> links('vendor.pagination.bootstrap-4')}}
        </div>
        @else
            <p>Not data</p>    
        @endif
    @endif
</div>


</body>

</html>