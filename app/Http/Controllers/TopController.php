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
            $items = Post::where('tag_id',$id)->get();
            return view("top",["items" => $items]);
        } else if($id == 0){
            $items = Post::orderBy('created_at', 'desc')->get();
            return view("top",["items" => $items]);
        }
    }

    // public function top() {
    //     $items = Post::all()->sortByDesc("created_at");
    //     return view("top",["items" => $items]);
    // }
}
