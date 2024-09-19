<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function index(Request $request){
        // postのidを受け取る
        $postId = $request->id;
        $userId = Auth::id();
        // データベースからid検索による投稿情報を受け取る
        $item = Post::find($postId);
        // データベースからid検索によるユーザー情報を受け取る
        $user = User::find(1);
        // データベースからタグの情報を受け取る
        $tag = Tag::find($item["tag_id"]);

        return view("edit",["item" => $item,"user" => $user,"tag" => $tag]);
 
    }
}
