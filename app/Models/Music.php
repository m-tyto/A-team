<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';

    protected $fillable = ["id", "artist", "title", "text", "link"];

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