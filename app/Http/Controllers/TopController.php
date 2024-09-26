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
            'work' => 3,
            'security' => 4,
            'disaster' => 5,
            'life' => 6,
            'manegement' => 7,
            'other' => 8
        ];
        
        // 各タブごとの一覧を表示
            $items = Post::where('delete_flag', 0)->where('problem_flag',0)->orderBy('created_at', 'desc')->get();
            $eco_items = Post::where('delete_flag', 0)->where('problem_flag',0)->where('tag_id',$tagId['eco'])->orderBy('created_at', 'desc')->get();
            $cook_items = Post::where('delete_flag', 0)->where('problem_flag',0)->where('tag_id',$tagId['cook'])->orderBy('created_at', 'desc')->get();
            $work_items = Post::where('delete_flag', 0)->where('problem_flag',0)->where('tag_id',$tagId['work'])->orderBy('created_at', 'desc')->get();
            $security_items = Post::where('delete_flag', 0)->where('problem_flag',0)->where('tag_id',$tagId['security'])->orderBy('created_at', 'desc')->get();
            $disaster_items = Post::where('delete_flag', 0)->where('problem_flag',0)->where('tag_id',$tagId['disaster'])->orderBy('created_at', 'desc')->get();
            $life_items = Post::where('delete_flag', 0)->where('problem_flag',0)->where('tag_id',$tagId['life'])->orderBy('created_at', 'desc')->get();
            $manegement_items = Post::where('delete_flag', 0)->where('problem_flag',0)->where('tag_id',$tagId['manegement'])->orderBy('created_at', 'desc')->get();
            $other_items = Post::where('delete_flag', 0)->where('problem_flag',0)->where('tag_id',$tagId['other'])->orderBy('created_at', 'desc')->get();

        
            $id = 1;
            $share_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->orderBy('created_at', 'desc')->get();
            $share_eco_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['eco'])->orderBy('created_at', 'desc')->get();
            $share_cook_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['cook'])->orderBy('created_at', 'desc')->get();
            $share_work_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['work'])->orderBy('created_at', 'desc')->get();
            $share_security_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['security'])->orderBy('created_at', 'desc')->get();
            $share_disaster_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['disaster'])->orderBy('created_at', 'desc')->get();
            $share_life_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['life'])->orderBy('created_at', 'desc')->get();
            $share_manegement_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['manegement'])->orderBy('created_at', 'desc')->get();
            $share_other_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['other'])->orderBy('created_at', 'desc')->get();
        
        return view("top",[ "items" => $items,
                            "eco_items" => $eco_items,
                            "work_items" => $work_items,
                            "cook_items" => $cook_items,
                            "security_items" => $security_items,
                            "disaster_items" => $disaster_items,
                            "life_items" => $life_items,
                            "manegement_items" => $manegement_items,
                            "other_items" => $other_items,
                            "share_items" => $share_items,
                            "share_eco_items" => $share_eco_items,
                            "share_cook_items" => $share_cook_items,
                            "share_work_items" => $share_work_items,
                            "share_security_items" => $share_security_items,
                            "share_disaster_items" => $share_disaster_items,
                            "share_life_items" => $share_life_items,
                            "share_manegement_items" => $share_manegement_items,
                            "share_other_items" => $share_other_items,]);
    }
        // if (Auth::check()) {
        //     // ログインしているユーザーはリダイレクト
        //     return redirect('/top');
        // } else {
        //     // 未ログインのユーザーにはトップページを表示
        //     return view('top');
        // }
     

    public function search(Request $request){

        $tagId = [
            'eco' => 1, 
            'cook' => 2,
            'work' => 3,
            'security' => 4,
            'disaster' => 5,
            'life' => 6,
            'manegement' => 7,
            'other' => 8
        ];
        // idは0で
        $id = 0;
        // 送信されたテキストを受け取る
        $text = $request->text ?? "";
        // テキストボックスが空の状態で検索ボタンが押されたかどうか
        if($text !== ""){
            // 曖昧検索で使用する%をエスケープ処理する
            $pat = '%' . addcslashes($text, '%_\\') . '%';
            // データベースから条件に一致したデータを受け取る
            $items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->orderByDesc("created_at")->get();
            $eco_items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->where('tag_id',$tagId['eco'])->orderByDesc("created_at")->get();;
            $cook_items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->where('tag_id',$tagId['cook'])->orderByDesc("created_at")->get();;
            $work_items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->where('tag_id',$tagId['work'])->orderByDesc("created_at")->get();;
            $security_items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->where('tag_id',$tagId['security'])->orderByDesc("created_at")->get();;
            $disaster_items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->where('tag_id',$tagId['disaster'])->orderByDesc("created_at")->get();;
            $life_items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->where('tag_id',$tagId['life'])->orderByDesc("created_at")->get();;
            $manegement_items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->where('tag_id',$tagId['manegement'])->orderByDesc("created_at")->get();;
            $other_items = Post::where('delete_flag',0)->where(function ($q) use ($pat){$q -> where("title","LIKE",$pat) -> orWhereHas("User",function($q) use ($pat){$q->where("name","LIKE",$pat);});})->where('tag_id',$tagId['other'])->orderByDesc("created_at")->get();;
        }else{
            // 一覧検索
            $items = Post::where('delete_flag', 0)->where('problem_flag',$id)->orderBy('created_at', 'desc')->get();
            $eco_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['eco'])->orderBy('created_at', 'desc')->get();
            $cook_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['cook'])->orderBy('created_at', 'desc')->get();
            $work_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['work'])->orderBy('created_at', 'desc')->get();
            $security_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['security'])->orderBy('created_at', 'desc')->get();
            $disaster_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['disaster'])->orderBy('created_at', 'desc')->get();
            $life_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['life'])->orderBy('created_at', 'desc')->get();
            $manegement_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['manegement'])->orderBy('created_at', 'desc')->get();
            $other_items = Post::where('delete_flag', 0)->where('problem_flag',$id)->where('tag_id',$tagId['other'])->orderBy('created_at', 'desc')->get();

        }
       
        return view("top",[ "items" => $items,
        "eco_items" => $eco_items,
        "work_items" => $work_items,
        "cook_items" => $cook_items,
        "security_items" => $security_items,
        "disaster_items" => $disaster_items,
        "life_items" => $life_items,
        "manegement_items" => $manegement_items,
        "other_items" => $other_items,
        "id" => $id]);
        
    } 
 
}
