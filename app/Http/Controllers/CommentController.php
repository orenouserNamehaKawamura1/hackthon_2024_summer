<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request){
        // パラメータを受け取る
        $detailId = $request->detailId;
        $commentMessage = $request->comment;
        $userId = Auth::id();

        // 登録するデータの連想配列
        $param = [
            "post_id" => $detailId,
            "user_id" => $userId,
            "comment" => $commentMessage,
            "delete_flag" => 0
        ];

        // データベースに登録する
        $comment = new Comment;

         // 保存する
         $comment->fill($param)->save();

         // detailtページにリダイレクトする
         return redirect(route('detail', [
            'id' => $detailId,
        ]));
    }
}
