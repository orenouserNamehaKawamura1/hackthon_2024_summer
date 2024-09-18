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
        <p><img src="{{asset('storage/'.$item->img_path)}}" alt="" srcset="" width = "300px" height = "200px"></p>
        <p>{{$tag->name}}</p>
        <p>{{$item->problem_flag ? '共有':'お悩み'}}</p>
        <h2>{{$item->title}}</h2>
        <p>{{$item->description}}</p>
        <p>{{$item->created_at->format('Y/m/d')}}</p>
    @endif
</html>
