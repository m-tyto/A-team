<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Music;
use App\Models\Category;
use App\Models\Like;
use App\User;
use Validator;


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
        
        $categories = Category::All();
        $artists = Music::select('artist')->distinct()->get();
        $user_id = Auth::id();
        if(!$user_id){
            return view("auth.login");
        }

        return view("musics.create")->with([
            'categories' => $categories,
            'artists' => $artists,
            'user_id' => $user_id
            ]);;
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
        $Category = $request -> input('category');
        #クエリ生成
        $query = Music::query();
        $query1= Category::query();
        #もしキーワードがあったら
        if(!empty($Keyword))
        {
            $message = "検索できました";
            $musics= $query->where('title','like','%'.$Keyword.'%') -> get();
            foreach($musics as $music){
            $category=$music-> category ->name;
            }
            return view('musics.show')->with([
                'message' => $message,
                'musics' => $musics,
                'category' => $category,
            ]);
        }elseif (!empty($Category)){
            $message = "検索できました";
            $categories = $query1->where('name','like', '%'.$Category.'%')-> get();
            foreach($categories as $category){
            $id=$category-> id ;
            $music= Music::find($id) ;
            }
            // dd($music);
            return view('musics.show')->with([
                'message' => $message,
                'music' => $music,
                'categories' => $categories,
            ]);
        }
        else {
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
}
