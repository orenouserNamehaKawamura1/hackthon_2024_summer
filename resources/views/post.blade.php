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
        <option value="1">節約術</option>
        <option value="2">自炊</option>
        <option value="3">家事</option>
        <option value="4">防犯</option>
        <option value="5">防災</option>
        <option value="6">暮らし</option>
        <option value="7">支出監理</option>
        <option value="8">その他</option>
    </select>
    <textarea name="description"></textarea>
    <input type="radio" name="problem" value="0">お悩み　　<input type="radio" name="problem" value="1">共有
    <button type="submit">投稿</button>
</form>
</body>
</html>