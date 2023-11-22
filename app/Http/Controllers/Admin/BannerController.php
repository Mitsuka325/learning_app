<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BannerStoreRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.banner.admin_banner_index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.admin_banner_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerStoreRequest $request)
    {
        DB::beginTransaction(); // トランザクションを開始
        try {
            $validatedData = $request->validated(); // バリデーション済みデータ取得
            $validatedData['image'] = $request->input('image');
            $banner = new Banner(); 
            $banner->fill($validatedData);
    
            if ($request->hasFile('image')) {
                $imgPath = $request->file('image')->store('banners','public');
                $banner->image = $imgPath;
            }
            $banner->save(); // データベースへの保存
    
            DB::commit(); // トランザクションをコミット
            return redirect()->route('admin.banner.index')->with('flash_message', 'バーナーの登録が完了しました');
            
        } catch (\Throwable $th) {
            DB::rollBack(); // エラーがあった場合はロールバック
            return back()->withErrors(['error' => 'バーナーの作成に失敗しました']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
{
    
}
}