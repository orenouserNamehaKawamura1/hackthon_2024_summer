<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>編集ページ</h1>

<form action="{{route('editPost',['id' => $item->id])}}" method="post" enctype="multipart/form-data">
    @csrf    
    <a href="{{route('deletePost',['id' => $item->id])}}">削除する</a>
    @if(isset($item) && isset($user))
        title<input type="text" name="title" value="{{$item->title}}">
        <select name="tag">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}" {{$tag->id === $item->tag->id ? "selected" : ""}}>{{$tag->name}}</option>
            @endforeach
        </select>

        <button type="button" id="selectOpen">選択</button>
        <input type="file" name="image">
        <textarea name="description">{{$item->description}}</textarea>
        <input type="radio" name="problem" value="0" {{$item->problem_flag ? "" : "checked"}}>お悩み　　<input type="radio" name="problem" value="1" {{$item->problem_flag ? "checked" : ""}}>共有
        <button type="submit">編集</button>
    @endif
</form>
</body>
</html>

