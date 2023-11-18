<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseStoreRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all(); // すべての授業を取得
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
    
      public function store(CourseStoreRequest $request)
  {
      DB::beginTransaction(); // トランザクションを開始
      try {
          $validatedData = $request->validated(); // バリデーション済みデータ取得
          $validatedData['grade_id'] = $request->input('grade_id');
          $course = new Course(); 
          $course->fill($validatedData);
  
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

  
    // public function show(Course $course)
    // {
        public function show($id)
{
    $course = Course::find($id); // コース情報をIDで取得

    if (!$course) {
    }
        return view('admin.course.admin_course_show', compact('course'));
    }


    public function edit(Course $course)
    {
        return view('admin.course.admin_course_edit', compact('course'));
    }


    public function update(Request $request, Course $course)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validated(); 
            $course->fill($validatedData);

            if ($request->hasFile('img_path')) {
                $imgPath = $request->file('img_path')->store('images');
                $course->image= $imgPath;
            }
            $course->save();
            DB::commit();
            return redirect()->route('admin.course.index')->with('flash_message', '授業が更新されました');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => '授業の更新に失敗しました']);
        }
    }

    public function destroy(Course $course)
    {
        DB::beginTransaction();
        try {
            $course->delete();
            DB::commit();
            return redirect()->route('admin.course.index')->with('flash_message', '授業が削除されました');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => '授業の削除に失敗しました']);
        }
    }
}