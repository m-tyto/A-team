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
        $title = $request->input('title');
        $artist = $request->input('artist');
        $check = Music::where('artist',$artist)->where('title',$title)->exists();
        $this->validate($request,[
            'title' => ['required',
                        function($attribute, $value, $fail)use($check){
                            if($check){
                                return $fail('既に登録されている曲です');
                            }
                        }],
            'artist' => 'required|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'category_id' => 'required',
            'text' => 'nullable',
            'link' => 'nullable'
        ],[
            'title.required' => '曲名を入力してください',
            'artist.required' => 'アーティスト名を入力してください',
            'artist.regex' => 'アーティスト名は全角カタカナで入力してください',
            'category_id.required' => 'カテゴリを選択してください'
        ]);

        Music::create($request->all());
        $md= Music::get();
        // dd(count($md));
        $music_id = count($md);
        $user_id = Auth::id();

        return redirect()->route('groundlike', ['title' => $title]);
        // return redirect('/groundlike') -> with(
        //     'title' , $title
        // );
    }

    public function groundlike(Request $request)
  {
    $title =$request-> title;
    $query = Music::query();
    $musics= $query->where('title','like','%'.$title.'%' ) -> get();
    $musics= $query->where ('user_id', Auth::id()) -> get();
    foreach( $musics as $music){
        $music_id = $music -> id;
    }
        Like::create([
            'music_id' => $music_id,
            'user_id' =>  Auth::id(),
        ]);
    return redirect('/');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
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
            if($i= count($musics)==0){
                $message = '存在しません';
                return view('musics.search')->with([
                    'message' => $message,
                ]);
            }else{
                $message = '存在しました';
                return view('musics.search')->with([
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
            $musics= $query->where('title','like','%'.$Keyword.'%') -> get();
            $i=count($musics) ;
            if($i < 1 ){
            $message = "曲はありません";
            }else{
                $message = "カテゴリが".$i. "存在しました";
            }
            return view('musics.search')->with([
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
                return view('musics.search')->with([
                    'message' => $message,
                ]);
            }else{
                $count = $musics -> count();
                $message =  '曲が' . $count . '曲あります';
                return view('musics.search')->with([
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
