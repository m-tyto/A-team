<?php
namespace app\Common;

use App\Models\Music;
use App\Models\Like;
use App\Models\Category;
use App\User;
$query = Music::query();
$query1= Like::query();
$query2=Category::query();

class sayHelloClass
{
    public static function music_rank ($category_id){
        $musics = $query->where('category_id', $category_id)-> get();
        return $musics;
    }
}