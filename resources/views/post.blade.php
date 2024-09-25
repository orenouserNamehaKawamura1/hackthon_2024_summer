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
    <main class="flex">
        @component("layouts.sideber")
        @endcomponent
        <form id="form" action="/post" method="post" enctype="multipart/form-data">
        <h1>投稿</h1>
        <p>悩みや知識を発信しよう！</p>
        @csrf    
        <div id="imgBox">
            <img src="" alt="" hidden id="postImg">
            <label for="file">
                <button type="button" id="fileButton" class="flex pointer">
                    <img src="/img/plus.png" alt="">
                    <p>画像を追加</p>
                </button>
            </label>
            <input type="file" name="image" id="inputFile">
        </div>
        <input type="text" name="title" placeholder="タイトル" id="title">
        <textarea name="description" id="description" placeholder="本文"></textarea>
        <div>
            <p>タグ</p>
            <div class="flex">
                <select name="tag" id="tagSelect">
                    @if(isset($items))
                        @foreach($items as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    @endif
                </select>
                <button type="button" id="selectOpen">選択</button>
                <input type="radio" name="problem" value="0" class="problem" id="worries"><label for="worries" class="problemLabel" hidden="hidden">お悩み</label><input type="radio" name="problem" value="1" class="problem" checked id="share"><label for="share" class="problemLabel">共有</label>
            </div>
        </div>
               <button type="submit">投稿</button>
    </form>
</main>
<div id="editMenu">
    <div class="flex">
        <h2>タグの編集</h2>
        <button type="button" id="closeButton">
            <img src="/img/close.png" alt="">
        </button>
    </div>
    <p id="sabTitle">ほかの人が見つけるときに便利なタグを設定しましょう</p>
    <div id="taglabel">
        @foreach($items as $item)
            <label class="pointer"><div class="flex"><input type="radio" name="tag" class="pointer TagRadio" value="{{$item->id}}"><p>{{$item->name}}</p></div></label>
        @endforeach
    </div>
    <div id="problem">
        <p>お悩み相談ですか？</p>
        <div class="flex">
        <p>悩み相談の場合、チェックするとお悩みタグが追加されます。チェックしない場合、共有タグが追加。</p>
        <div class="toggle-switch">
            <input id="toggle" class="toggle-input" type='checkbox' />
            <label for="toggle" class="toggle-label"></label>
        </div> 
    </div>
    </div>
    <input type="button" value="追加" id="addButton" class="pointer">
</div>  

<script src="/js/post.js"></script>
</body>
</html>
