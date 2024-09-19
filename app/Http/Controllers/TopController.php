<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TopController extends Controller
{
    public function index(){
        $items = Post::where('delete_flag',0)->get()->sortByDesc("created_at");
        return view("top",["items" => $items]);
    }

    public function top() {
        $items = Post::all()->sortByDesc("created_at");
        return view("top",["items" => $items]);
    }
}
