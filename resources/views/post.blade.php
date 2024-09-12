<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>投稿</h1>
<form action="/post" method="post">
    @csrf    
    title<input type="text" name="title">
    <select name="tag">
        @if(isset($items))
            @foreach($items as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        @endif
    </select>
    <textarea name="description"></textarea>
    <input type="radio" name="problem" value="0">お悩み　　<input type="radio" name="problem" value="1">共有
    <button type="submit">投稿</button>
</form>
</body>
</html>