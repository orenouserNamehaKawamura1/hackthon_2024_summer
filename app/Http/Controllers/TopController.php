<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TopController extends Controller
{
    public function index(){
        $items = Post::all();
        return view("top",["items" => $items]);
    }

    public function top() {
        $items = Post::all();
        return view("top",["items" => $items]);
    }
}
