<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BannerStoreRequest;
use App\Http\Requests\BannerUpdateRequest;

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
                $imgPath = $request->file('image')->store('images');
                $banner->image = $imgPath;
            }
            $banner->save(); // データベースへの保存
    
            DB::commit(); // トランザクションをコミット
            return redirect()->route('admin.banner.index')->with('flash_message', 'バナーの登録が完了しました');
            
        } catch (\Throwable $th) {
            DB::rollBack(); // エラーがあった場合はロールバック
            return back()->withErrors(['error' => '授業の作成に失敗しました']);
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
        return view('admin.banner.admin_banner_edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validated();
            $banner->fill($validatedData);
            
            if ($request->hasFile('image')) {
                $imgPath = $request->file('image')->store('images');
                $banner->image = $imgPath;
            }

            $banner->save();
            DB::commit();
            return redirect()->route('admin.banner.index')->with('flash_message', 'バナーの更新が完了しました');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => '更新に失敗しました']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        DB::beginTransaction();
        try {
            // 画像を削除するコード
            // Storage::delete($banner->image);

            $banner->delete();
            DB::commit();
            return redirect()->route('admin.banner.index')->with('flash_message', 'バナーを削除しました');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => '削除に失敗しました']);
        }
    }
}