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
        <span>{{$tags->[$item->tag]}}</span>
    @endif
</html>