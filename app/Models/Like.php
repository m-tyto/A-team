<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['music_id','user_id'];

    public function user(){
        return $this->belongsTo("App\User");
    }

    public function music(){
        return $this->belongsTo("App\Models\Music");
    }
}
