<?php

namespace App\Http\Controllers;

use App\tailieu_ta;
use App\loai_tailieu_ta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost = DB::table('tailieu_tas')
            ->select(['id', 'created_at', 'name_post', 'views'])
            ->get();
        return view('dashboardpost', ['listpost' => $listPost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategories = loai_tailieu_ta::all();
        return view('uploaddocplus', ['listCategories' => $listCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namePost = $request->postname;
        $idCategory = $request->category;
        $contentPost = $request->editor1;
        $post = new tailieu_ta();
        $post->name_post = $namePost;
        $post->contents_post = $contentPost;
        $post->category_id = $idCategory;
        $post->views = 0;
        $post->save();
        return redirect()->route('dashboardpost');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tailieu_ta  $tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function show($idpost)
    {
        $aPost = DB::table('tailieu_tas')->find($idpost);
        return view('detailanpost', ['aPost' => $aPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tailieu_ta  $tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function edit($idpost)
    {
        $aPost = DB::table('tailieu_tas')->find($idpost);
        return view('updatepost', ['aPost' => $aPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tailieu_ta  $tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tailieu_ta $tailieu_ta)
    {
        DB::table('tailieu_tas')
            ->where('id', $request->idpost)
            ->update(['contents_post' => $request->editor1, 'name_post' => $request->postname]);
        return redirect()->route('dashboardpost');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tailieu_ta  $tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpost)
    {
        DB::table('tailieu_tas')->where('id', '=', $idpost)->delete();
        return redirect()->route('dashboardpost');
    }
}
