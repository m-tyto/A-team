<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return $this->hasmany("App\Models\Like",'music_id');
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach($this->likes as $like) {
        array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
        return true;
        } else {
        return false;
        }
        // return $this->hasmany("App\Models\Like");

    }
}