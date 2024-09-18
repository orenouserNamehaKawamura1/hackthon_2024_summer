<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public function likedPosts() {
        return $this->belongsToMany('App/Model/Post');
    }

    public function likedByUsers() {
        return $this->belongsToMany('App/Model/User');
    }
}
