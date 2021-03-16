<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Like;
use App\Models\Category;
use App\User;


class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('musics.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //キーワードを受け取る
        $Keyword = $request -> input('keyword');
        $Category_ID = $request -> input('category');
        #クエリ生成
        $query = Music::query();
        $query1= Category::query();
        //曲、カテゴリ両方検索されたら
        if (!empty($Category_ID) && !empty($Keyword) ){
            $musics= $query->where('title','like','%'.$Keyword.'%' ) -> get();
            $musics= $query->where ('category_id', $Category_ID) -> get();
            $Category = Category::find($Category_ID)-> name;
            if (empty($musics)){
                $message = '曲がありません';
                return view('musics.show')->with([
                    'message' => $message,
                ]);
            }else{
                $message = '存在しました';
                return view('musics.show')->with([
                    'message' => $message,
                    'musics' => $musics,
                    'Category' => $Category,
                    'Keyword' => $Keyword,
                ]);
            }
        }
        // 曲が入力されたら
        elseif(!empty($Keyword))
        {
            $message = "検索できました";
            $musics= $query->where('title','like','%'.$Keyword.'%') -> get();
            // dd($musics);
            // foreach($musics as $music){
            // $categories=$music-> category ->name;
            // }
            // dd($musics1);
            return view('musics.show')->with([
                'message' => $message,
                'musics' => $musics,
                'Keyword' => $Keyword,
            ]);
        // もしカテゴリが選択されたら
        }elseif (!empty($Category_ID)){
            $Category = Category::find($Category_ID)-> name;
            $musics= $query->where('category_id',$Category_ID)-> get();
            // foreach($categories as $category){
            // $id=$category-> id;
            // $musics= $query->where('category_id',$id)-> get();
            // }
            if (empty($musics)){
                $message = '曲がありません';
                return view('musics.show')->with([
                    'message' => $message,
                ]);
            }else{
                $count = $musics -> count();
                $message =  '曲が' . $count . '曲あります';
                return view('musics.show')->with([
                    'message' => $message,
                    'musics' => $musics,
                    'Category' => $Category,
                    'Category_ID' => $Category_ID,

                    // 'id' => $id,
                ]);
            }
        }else {
            $message = "検索結果ありません";
        }
    }
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

    public function countlike(Request $request)
    {
        $music = $request -> music;
        $likescount = $request -> likescount;
        $id = $request -> id;
        $query = Music::query();
        $query
        ->where('id', $id)
        ->update([
            'likescount' => $likescount+1
        ]);
        return back() ;
    }

}
