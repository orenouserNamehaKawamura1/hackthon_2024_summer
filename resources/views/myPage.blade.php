<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ここはmypageです</h1>
</body>
<h2>投稿一覧</h2>
<div class="tab-content">
    @if(isset($items))
    @foreach($items as $item)
    <div style="margin-bottom: 10px">
        <h2>{{$item->title}}</h2>
        <p>{{$item->description}}</p>
        <p>{{$item->user->name}}</p>
        <p>{{$item->good}}</p>
        <a href="{{route('edit',['id' => $item->id])}}">編集する</a>
    </div>
    @endforeach
    @endif
</div>
<style>
    div + div{
        border-top: 1px solid black;
    }
</style>
</html>