<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">
</head>
<body>
    <h1>ここはmypageです</h1>
    @component("layouts.sideber")
    @endcomponent
<h2>投稿一覧</h2>
<div class="tab-content">
    @if(isset($items))
        @foreach($items as $item)
            @if(!$item->delete_flag)
                <div style="margin-bottom: 10px">
                    <h2>{{$item->title}}</h2>
                    <p>{{$item->description}}</p>
                    <p>{{$item->user->name}}</p>
                    <p>{{$item->good}}</p>
                    <a href="{{route('edit',['id' => $item->id])}}">編集する</a>
                </div>
            @endif    
        @endforeach
    @endif
</div>

</body>

</html>