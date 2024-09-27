<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ideus</title>
    <link rel="stylesheet" href="/css/post-style.css">
    <link rel="stylesheet" href="{{asset('/css/all-style.css')}}">
    @component("layouts.fonts")
    @endcomponent
</head>

<body class="noto-sans-jp-400">
    <main class="flex">
        @component("layouts.sideber")
        @endcomponent
        <form id="form" action="/post" method="post" enctype="multipart/form-data">
            <h1>投稿</h1>
            <p>悩みや知識を発信しよう！</p>
            <div class="post_main">
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
                <!-- タイトル -->
                <div class="main_title">
                    <input type="text" name="title" id="title" class="title_input" placeholder=""
                        value="{{isset($title) ? $title : ''}}">
                    <label style="pointer-events: none;">タイトル</label>
                    <span class="underline"></span>
                </div>
                <p style="color : #FA6B62;">{{isset($titleError) && $titleError ? "タイトルが空でした。" : ""}}</p>

                <!-- 投稿内容 -->

                <div class="main_content">
                    <textarea name="description" id="description" class="content_textarea"
                        placeholder="">{{isset($description) ? $description : ""}}</textarea>
                    <label>投稿内容(1000文字以内)</label>
                    <span class="underline2"></span>
                </div>
                <p style="color : #FA6B62;">{{isset($descriptionError) && $descriptionError ? "本文が空でした。" : ""}}</p>

                <div>
                    <p id="tag_p">タグ</p>
                    <div class="flex main_tag">
                        <select name="tag" id="tagSelect" style="pointer-events: none;" class="noto-sans-jp-400">
                            @if(isset($items))
                            @foreach($items as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        <input type="radio" name="problem" value="0" class="problem" id="worries">
                        <label for="worries" class="problemLabel" hidden="hidden">お悩み</label><input type="radio"
                            name="problem" value="1" class="problem" checked id="share"><label for="share"
                            class="problemLabel">共有</label>
                        <button type="button" id="selectOpen" class="noto-sans-jp-400">選択</button>

                    </div>
                </div>
                <button type="submit" class="post_button noto-sans-jp-400">投稿する</button>
            </div>
        </form>
    </main>
    <div id="editMenu">
        <div id="editList">
            <div class="flex">
                <h2>タグの編集</h2>
                <button type="button" id="closeButton">
                    <img src="/img/close.png" alt="">
                </button>
            </div>
            <p id="sabTitle">ほかの人が見つけるときに便利なタグを設定しましょう</p>
            <div id="taglabel">
                @foreach($items as $item)
                <label class="pointer">
                    <div class="flex"><input type="radio" name="tag" class="pointer TagRadio" value="{{$item->id}}">
                        <p>{{$item->name}}</p>
                    </div>
                </label>
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

    </div>

    <script src="/js/post.js"></script>
</body>

</html>