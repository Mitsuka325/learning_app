<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::latest()->get();
        return view('admin.notice.admin_notice_index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.admin_notice_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notice = new Notice();
        $notice->post_time = $request->input('post_time');
        $notice->title = $request->input('title');
        $notice->description = $request->input('description');
        $notice->save();
        return redirect()->route('admin.notice.index')->with('flash_message', 'お知らせを追加しました');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view('admin.notice.admin_notice_edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $notice->post_time=$request->input('post_time');
        $notice->title = $request->input('title');
        $notice->description = $request->input('description');
        $notice->save();
        return redirect()->route('admin.notice.index')->with('flash_message', 'お知らせを変更しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
            $notice->delete();
    
            return redirect()->route('admin.notice.index')->with('flash_message', 'お知らせを削除しました。');
        }
    }
