<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/post-style.css">
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">

</head>
<body>
@component("layouts.sideber")
@endcomponent
<h1>投稿</h1>
<form action="/post" method="post" enctype="multipart/form-data">
    @csrf    
    title<input type="text" name="title">
    <select name="tag">
        @if(isset($items))
            @foreach($items as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        @endif
    </select>
    <button type="button" id="selectOpen">選択</button>
    <input type="file" name="image">
    <textarea name="description"></textarea>
    <input type="radio" name="problem" value="0">お悩み　　<input type="radio" name="problem" value="1">共有
    <button type="submit">投稿</button>
</form>
<div id="selectTag">
    <div class="flex">
        <h2>タグの編集</h2>
        <img src="/img/close.png" alt="">
    </div>
</div>
<script src="/js/post.js"></script>
</body>
</html>
