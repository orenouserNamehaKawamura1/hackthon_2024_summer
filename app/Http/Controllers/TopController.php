<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class TopController extends Controller
{
    public function index(Request $request){
        $tagId = [
            'eco' => 1,
            'cook' => 2,
            'security' => 3,
            'disaster' => 4,
            'life' => 5,
            'manegement' => 6,
            'other' => 7
        ];
        // if(isset($id)) {
        //     //取得してきたidをもとにタグごとの一覧表示
        //     $items = Post::where('tag_id',$id)->where('delete_flag',0)->get()->sortByDesc("created_at");
        //     return view("top",["items" => $items]);
        // } else if($id == 0){
        //     $items = Post::where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        //     return view("top",["items" => $items]);
        // }

        // 各タブごとの一覧を表示
        $items = Post::where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        $eco_items = Post::where('tag_id',$tagId['eco'])->where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        $cook_items = Post::where('tag_id',$tagId['cook'])->where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        $security_items = Post::where('tag_id',$tagId['security'])->where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        $disaster_items = Post::where('tag_id',$tagId['disaster'])->where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        $life_items = Post::where('tag_id',$tagId['life'])->where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        $manegement_items = Post::where('tag_id',$tagId['manegement'])->where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        $other_items = Post::where('tag_id',$tagId['other'])->where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        return view("top",[ "items" => $items,
                            "eco_items" => $eco_items,
                            "cook_items" => $cook_items,
                            "security_items" => $security_items,
                            "disaster_items" => $disaster_items,
                            "life_items" => $life_items,
                            "manegement_items" => $manegement_items,
                            "other_items" => $other_items,]);
    }
        // if (Auth::check()) {
        //     // ログインしているユーザーはリダイレクト
        //     return redirect('/top');
        // } else {
        //     // 未ログインのユーザーにはトップページを表示
        //     return view('top');
        // }
     

    public function search(Request $request){
        // 送信されたテキストを受け取る
        $text = $request->text ?? "";
        // テキストボックスが空の状態で検索ボタンが押されたかどうか
        if($text !== ""){
            // 曖昧検索で使用する%をエスケープ処理する
            $pat = '%' . addcslashes($text, '%_\\') . '%';
            // データベースから条件に一致したデータを受け取る
            $items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->get()->sortByDesc("created_at");
        }else{
            // 一覧検索
            $items = Post::where('delete_flag',0)->orderBy('created_at', 'desc')->get();
        }
       
        return view("top",["items" => $items, "text" => $text]);
        
    } 
 
}
