<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-wppidth, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">
    @component("layouts.fonts")
    @endcomponent
    <title>Document</title>
</head>

<body class="flex">
    @component("layouts.sideber")
    @endcomponent
    <div class="noto-sans-jp-400">
        @if(isset($item) && isset($user))
        <p>{{$user->name}}</p>
        <p><img src="{{asset('storage/'.$item->img_path)}}" alt="" srcset="" width="300px" height="200px"></p>
        <p>{{$tag->name}}
            {{$item->problem_flag ? '共有':'お悩み'}}
        </p>
        <form action="{{route('detail',['id' => $item->id])}}" method="post">
            @csrf
            <input type="hidden" value="{{$item->id}}" name="id">
            <input type="submit" value="いいね">
        </form>
        <p>{{$item->good}}</p>
        <h2>{{$item->title}}</h2>
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
            <ul>
                @foreach($comments as $comment)
                <li>
                    <h3>{{$comment->user->name}}</h3>
                    <p>{{$comment->created_at->format("Y/m/d")}}</p>
                    <p>{{$comment->comment}}</p>
                </li>
                @endforeach
            </ul>

        </div>
        @endif
    </div>
</body>

</html>