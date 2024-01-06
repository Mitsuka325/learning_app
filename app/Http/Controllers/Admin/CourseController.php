<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->grade) {
            $courses = Course::all();
        } else {
            $courses = Course::where('grade_id', $request->grade)->get();
        }
        return view('admin.course.admin_course_index', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.admin_course_create');
    }

    // 作成機能
    public function store(CourseStoreRequest $request)
    {
        DB::beginTransaction(); // トランザクションを開始
        try {
            $validatedData = $request->validated(); // バリデーション済みデータ取得
            $validatedData['grade_id'] = $request->input('grade_id');
            $course = new Course();
            $course->fill($validatedData);

            $alwaysDeliveryFlg = $request->has('always_delivery_flg') ? true : false;
            $course->always_delivery_flg = $alwaysDeliveryFlg;

            if ($request->hasFile('img_path')) {
                $imgPath = $request->file('img_path')->store('images');
                $course->image = $imgPath;
            }
            $course->save(); // データベースへの保存

            DB::commit(); // トランザクションをコミット
            return redirect()->route('admin.course.index')->with('flash_message', '授業の登録が完了しました');
        } catch (\Throwable $th) {
            DB::rollBack(); // エラーがあった場合はロールバック
            return back()->withErrors(['error' => '授業の作成に失敗しました']);
        }
    }

    //   詳細ページ
    // public function show(Course $course)
    // {
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
        }
        return view('admin.course.admin_course_show', compact('course'));
    }

    // 更新ページ
    public function edit($id)
    {

        $course = Course::find($id);
        $grades = Grade::all(); // もしくは適切なデータを取得するクエリを実行

        return view('admin.course.admin_course_edit', compact('course', 'grades'));
    }

    // 更新処理
    public function update(CourseUpdateRequest $request, Course $course)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validated();
            $course->fill($validatedData);

            if ($request->hasFile('new_image')) {
                $imagPath = $request->file('new_image')->store('images');
                $course->image = $imagPath;
            }
            $course->save();
            DB::commit();
            return redirect()->route('admin.course.index')->with('flash_message', '授業が更新されました');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => '授業の更新に失敗しました']);
        }
    }

    // 削除機能
    public function destroy(Course $course, Request $request)
    {
        DB::beginTransaction();
        try {
            $course->delete();
            DB::commit();
            if ($request->ajax()) {
                return Course::search($request)->get();
            } else
                return redirect()->route('admin.course.index')->with('flash_message', '授業が削除されました');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => '授業の削除に失敗しました']);
        }
    }
}
