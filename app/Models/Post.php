<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ["user_id","tag_id","title","description","img_path","good","problem_flag","delete_flag"];
    use HasFactory;
    
}
