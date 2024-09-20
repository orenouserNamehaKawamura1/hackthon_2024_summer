<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class TopController extends Controller
{
    public function index(Request $request){
        // if (Auth::check()) {
        //     // ログインしているユーザーはリダイレクト
        //     return redirect('/top');
        // } else {
        //     // 未ログインのユーザーにはトップページを表示
        //     return view('top');
        // }
        $id = $request->id;
        if(isset($id)) {
            //取得してきたidをもとにタグごとの一覧表示
            $items = Post::where('tag_id',$id)->where('delete_flag',0)->get()->sortByDesc("created_at");
            return view("top",["items" => $items]);
        } else if($id == 0){
            $items = Post::where('delete_flag',0)->orderBy('created_at', 'desc')->get();
            return view("top",["items" => $items]);
        }
    }

    public function search(Request $request){
        // 送信されたテキストを受け取る
        $text = $request->text ?? "ないよ";
        // 曖昧検索で使用する%をエスケープ処理する
        $pat = '%' . addcslashes($text, '%_\\') . '%';
        // データベースから条件に一致したデータを受け取る
        $items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->get()->sortByDesc("created_at");
        return view("top",["items" => $items, "text" => $text]);
        
    } 
    // public function top() {
    //     $items = Post::all()->sortByDesc("created_at");
    //     return view("top",["items" => $items]);
    // }
}
