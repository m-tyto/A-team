<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';

    protected $fillable = ["id", "artist", "title", "text", "link" , "category_id", "user_id"];

    public function category(){
        return $this->belongsTo("App\Models\Category");
    }

    public function user(){
        return $this->belongsTo("App\User");
    }

    public function likes(){
        return $this->hasmany("App\Models\Like");
    }
}