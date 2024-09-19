<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    // 編集ページに投稿情報を表示する
    public function index(Request $request){
        // postのidを受け取る
        $postId = $request->id;
        $userId = Auth::id();
        // データベースからid検索による投稿情報を受け取る
        $item = Post::find($postId);
        // データベースからid検索によるユーザー情報を受け取る
        $user = User::find(1);
        // データベースからタグの情報を受け取る
        $tag = Tag::all();;
        return view("edit",["item" => $item,"user" => $user,"tags" => $tag]);
    }
    // 投稿情報を編集する
    public function edit(Request $request){
        // 登録するデータを受け取る
        $postId = $request->id;
        $userId = Auth::id();
        $title = $request->title;
        $tag = $request->tag;
        // $file = $request->file('ima ge');
        // $originalName = $file->getClientOriginalName();
        // $extension = $file->getClientOriginalExtension();
        // $name = pathinfo($originalName, PATHINFO_FILENAME);
        // $filename = $name.'.'. time() . '.' . $file->getClientOriginalExtension();
        // $path = $file->storeAs('public',$filename);
        $description = $request->description;
        $problem = $request->problem;

        // データベースから投稿情報を取得する
        $item = Post::find($postId);

        // 登録するデータの連想配列
        $param = [
            "user_id" => $userId,
            "tag_id" => $tag,
            "title" => $title,
            "description" => $description,
            "img_path" => $item->img_path,
            "good" => $item->good,
            "problem_flag" => $problem,
            "delete_flag" => $item->delete_flag,
        ];


        // 保存する
        $item->fill($param)->save();


        // マイページへリダイレクト
        return redirect("/myPage");
    }
    // 編集情報を削除する
    public function delete(Request $request){
        // 削除したい投稿情報のidを受け取る
        $id = $request->id;
        // データベースから投稿情報を取得する
        $item = Post::find($id);
        // 削除フラグを1にする
        $item->delete_flag = 1;
        // 更新する
        $item->save();
        // マイページへリダイレクト
        return redirect("/myPage");
    }
}
