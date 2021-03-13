<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ["id","name"];

    public function musics(){
        return $this->hasmany("App\Models\Music");
    }

}