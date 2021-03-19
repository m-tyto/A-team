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
        $musics = $category->musics;
        $music_counts = array();
        dd($musics);
        // $music_counts[] = Like::selectRaw('count(music_id) as music_count,music_id')->where('music_id',$music->id)->groupBy('music_id')->get();
        foreach($musics as $music){
            $judge = array_filter($music);
            dd($judge);
            if(empty($judge)){
                $music_counts[] = Like::selectRaw('count(music_id) as music_count,music_id')->where('music_id',$music->id)->groupBy('music_id')->get();
            }
            // foreach($music_counts as $music_count){
            //     $music_counts[] = $music_count;
            //     if (exist_file($music_count)){
            //         foreach($music_count as $md){
            //             $music_counts[] = $md;
            //         }
            //     }
            // }
        }
        dd($music_counts);
        $musics = array();
        foreach($music_counts as $music_count){
            foreach($music_count as $music){
                // if()
                $musics[] = Music::where('id',$music->music_id)->get();
            }
        }
        return view('categories.show')->with([
            'category' => $category,
            'music_counts' => $music_counts,
            'musics' => $musics,
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
}

