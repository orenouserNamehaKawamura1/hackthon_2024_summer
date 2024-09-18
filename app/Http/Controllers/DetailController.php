<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\Favorite;

class DetailController extends Controller
{
    public function index(Request $request){
        // getパラメータでidを受けとる
        $id = $request->id;
        // データベースからid検索による投稿情報を受け取る
        $item = Post::find($id);
        // データベースからid検索によるユーザー情報を受け取る
        $user = User::find(1);
        // データベースからタグの情報を受け取る
        $tag = Tag::find($item["tag_id"]);

        return view("detail",["item" => $item,"user" => $user,"tag" => $tag]);
    }

    //いいね数を増加する関数
    public function count_increment(Request $request){
        // ログインしているユーザーのidを取得
        $userId = Auth::id();
        //フォームからidを受け取る
        $postId = $request->id;
        // 既にいいねしているか確認
        $existingLike = Favorite::where('user_id', $userId)->where('post_id', $postId)->first();

        if ($existingLike) {
            return redirect()->route('detail', ['id' => $postId])->with('message', '既にいいねしています');
        } else {
            // いいねを追加
            Favorite::create([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
        }

        // いいねのカウントを増やす処理
        $post = Post::find($postId);
        if ($post) {
            // いいねのカウントを増やす
            $post->good += 1;
            $post->save();
        }

        return redirect()->route('detail', ['id' => $postId]);
    }
}
