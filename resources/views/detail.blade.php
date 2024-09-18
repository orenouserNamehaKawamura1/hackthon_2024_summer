<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>詳細ページ</h1>
</body>
    @if(isset($item) && isset($user))
        <p>{{$user->name}}</p>
        <h2>{{$item->title}}</h2>
        <img src="{{asset('/storage/'.$item->img_path)}}" alt="">
        <span>{{$tag->name}}</span>
        <p>{{$item->description}}</p>
        <p>{{$item->created_at->format('Y/m/d')}}</p>
        <div>
            <h3>コメント</h3>
            <form action="/comment" method="post">
            @csrf
                <input type="text" name="comment">
                <input type="number" name="detailId" hidden value="{{$item->id}}">
                <input type="submit" value="コメント">
            </form>
        </div>
    @endif
</html>