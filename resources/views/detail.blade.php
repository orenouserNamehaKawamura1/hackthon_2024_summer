<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-wppidth, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/detail-style.css')}}">
    @component("layouts.fonts")
    @endcomponent
    <title>Document</title>
</head>

<body class="flex maingap">
    @component("layouts.sideber")
    @endcomponent
    <div class="noto-sans-jp-400 maincontent">
        @if(isset($item) && isset($user))
        <p class="midiumtext">{{$user->name}}</p>



        <h2 class="htext title-main ">{{$item->title}}</h2>
        <p class="subtext">{{$tag->name}}{{$item->problem_flag ? '共有':'お悩み'}}
        </p>

        <p class="maintext desc">{{$item->description}}</p>

        <div class=".mainothers">
            <div class="mainoutimg"><img src="{{asset('storage/'.$item->img_path)}}" alt="" srcset="" class="mainimage" width="300px" height="200px"></div>

            <div class="post_p_2 flex others graytext">

                <p class="daytext">{{$item->created_at->format('Y/m/d')}}</p>
                <div class="flex ingoods">
                    <div class="flex">
                    <p class="goodsimg"><img  src="/img/hart.png" width="70%" height="70%"><p class="goods">{{$item->good}}</p></p>

                    </div>
                    <div class="flex">
                    <p class="goodsimg"><img  src="/img/comment.svg" width="90%" height="90%"><p class="goods">{{$item->good}}</p></p>
                    </div>

                </div>

            </div>

        </div>
        <div>
            @if(Auth::check())
            <h3 class="htext">{{$item->good}}件のコメント</h3>
                <form action="/comment" method="post">
                    @csrf
                    <input type="text" name="comment">
                    <input type="number" name="detailId" hidden value="{{$item->id}}">
                    <input type="submit" value="コメント">
                </form>
            @else 
            @endif
            <ul>
                @foreach($comments as $comment)
                <li class="comment">
                    <div class="flex">
                    <h3>{{$comment->user->name}}</h3>
                    <p class="daytext comment_day graytext">{{$comment->created_at->format("Y/m/d")}}</p>
                    </div>
                    <p>{{$comment->comment}}</p>
                </li>
                @endforeach
            </ul>

        </div>
        @endif
    </div>
</body>

</html>
