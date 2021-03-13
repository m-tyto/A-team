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
        $query = Music::query();
        $query1= Like::query();
        $query2=Category::query();
        $md = Music::get();
        $categories = Category::get();
        return view('musics.index')->with([
            'categories' => $categories,
            'md' => $md,]);
        
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
        // 曲が入力されたら
        if(!empty($Keyword))
        {
            $Music = $Keyword ;
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
                'Music' => $Music,
            ]);
        // もしカテゴリが選択されたら
        }elseif (!empty($Category)){
            $categories = $query1->where('name',$Category)-> get();
            foreach($categories as $category){
            $id=$category-> id;
            $musics= $query->where('category_id',$id)-> get();
            }
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
                    'id' => $id,
                ]);
            }
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

    public function like($id)
  {
    Like::create([
      'music_id' => $id,
      'user_id' => Auth::id(),
    ]);

    session()->flash('success', 'You Liked the Music.');

    return redirect()->back();
  }

    public function unlike($id)
    {
        $like = Like::where('music_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        session()->flash('success', 'You Unliked the Music.');

        return redirect()->back();
  }
    // public function countlike(Request $request)
    // {
    //     $music = $request -> music;
    //     $likescount = $request -> likescount;
    //     $id = $request -> id;
    //     $query = Music::query();
    //     $query
    //     ->where('id', $id)
    //     ->update([
    //         'likescount' => $likescount+1
    //     ]);
    //     return back() ;
    // }

}
