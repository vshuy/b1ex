<?php

namespace App\Http\Controllers;

use App\loai_tailieu_ta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = DB::table('loai_tailieu_tas')
            ->get();
        return view('dashboardcategory', ['listCategories' => $listCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploadcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category= new loai_tailieu_ta();
        $category->name_category_post=$request->categoryname;
        $category->descripe =$request->categorydescripe;
        $category->save();
        return redirect()->route('dashboardcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\loai_tailieu_ta  $loai_tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function show(loai_tailieu_ta $loai_tailieu_ta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\loai_tailieu_ta  $loai_tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function edit(loai_tailieu_ta $loai_tailieu_ta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\loai_tailieu_ta  $loai_tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loai_tailieu_ta $loai_tailieu_ta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\loai_tailieu_ta  $loai_tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcategory)
    {
        DB::table('loai_tailieu_tas')->where('id', '=', $idcategory)->delete();
        return redirect()->route('dashboardcategory');
    }
}
