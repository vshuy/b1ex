<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loai_lythuyet;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:exam-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:exam-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:exam-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exam-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = DB::table('loai_lythuyets')
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
        $category = new loai_lythuyet();
        $category->ten_loai = $request->categoryname;
        $category->mota = $request->categorydescripe;
        $category->save();
        return redirect()->route('dashboardcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\loai_lythuyet  $loai_tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function show(loai_lythuyet $loai_tailieu_ta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\loai_lythuyet  $loai_tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function edit(loai_lythuyet $loai_tailieu_ta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\loai_lythuyet  $loai_tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loai_lythuyet $loai_tailieu_ta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\loai_lythuyet  $loai_tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcategory)
    {
        DB::table('loai_lythuyets')->where('id', '=', $idcategory)->delete();
        return redirect()->route('dashboardcategory');
    }
}
