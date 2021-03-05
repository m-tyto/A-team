<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'music_id',
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function musics()
    {
        return $this->belongsTo(Music::class);
    }
}
