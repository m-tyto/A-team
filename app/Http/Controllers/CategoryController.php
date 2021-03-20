<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Like;
use App\Models\Category;
use App\User;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responsent
     */
    public function show($id)
    {
        
        $category = Category::find($id) ;
        $c_musics = $category->musics;
        $music_counts = array();
        foreach($c_musics as $music){
            $music_counts[] = Like::selectRaw('count(music_id) as music_count,music_id')->where('music_id',$music->id)->groupBy('music_id')->orderBy('music_count','desc')->get();
        }
        
        $count = count($music_counts)-1;
        $this->music_count_sort($music_counts, 0, $count);

        $musics = array();
        foreach($music_counts as $music_count){
            foreach($music_count as $music){
                $musics[] = Music::where('id',$music->music_id)->get();
            }
        }
        
        return view('categories.show')->with([
            'category' => $category,
            'music_counts' => $music_counts,
            'musics' => $musics
        ]);
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function music_count_sort(&$list, $first, $last) {
        $firstPointer = $first;
        $lastPointer  = $last;
        //枢軸値を決める。配列の中央値
        $centerValue  = $list[intVal(($firstPointer + $lastPointer) / 2)][0]->music_count;
    
        //並び替えができなくなるまで
        do {
            //枢軸よりも左側で値が大きい場合はポインターは進める
            while ($list[$firstPointer][0]->music_count > $centerValue) {
                $firstPointer++;
            }
            //枢軸よりも右側で値が小さい場合はポインターを減らす
            while ($list[$lastPointer][0]->music_count < $centerValue) {
                $lastPointer--;
            }
            //この操作で左側と右側の値を交換する場所は特定
    
            if ($firstPointer <= $lastPointer) {
                //ポインターが逆転していない時は交換可能
                $tmp                 = $list[$lastPointer];
                $list[$lastPointer]  = $list[$firstPointer];
                $list[$firstPointer] = $tmp;
                //ポインタを進めて分割する位置を指定
                $firstPointer++;
                $lastPointer--;
            }
        } while ($firstPointer <= $lastPointer);
    
        if ($first < $lastPointer) {
            //左側が比較可能の時
            $this->music_count_sort($list, $first, $lastPointer);
        }
    
        if ($firstPointer < $last) {
            //右側が比較可能時
            $this->music_count_sort($list, $firstPointer, $last);
        }
    }
}

