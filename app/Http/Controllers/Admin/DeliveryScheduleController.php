<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliverySchedule;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\DeliveryStoreRequest;

class DeliveryScheduleController extends Controller
{
    public function index()
    {
        $courseId = request()->input('course_id'); // URLパラメーターからcourse_idを取得
        $lessonName = Course::where('id', $courseId)->value('lesson_name');
        $deliveries = DeliverySchedule::where('course_id', $courseId)->get();
        $courses = Course::all();
        return view('admin.delivery.admin_delivery_schedules_index', compact('deliveries','lessonName', 'courses'));
    }

    public function create()
    {
        return view('admin.delivery.admin_delivery_schedules_create');
    }

    public function store(DeliveryStoreRequest $request)
    {
        $validated = $request->validated();

        $delivery = new DeliverySchedule();
        $delivery->course_id = $validated['course_id'];
        $delivery->start_date = $validated['start_date'];
        $delivery->start_time = $validated['start_time'];
        $delivery->end_date = $validated['end_date'];
        $delivery->end_time = $validated['end_time'];

        $delivery->save();

        return response()->json(['success' => '配信情報が保存されました！']);
    }

    public function destroy(DeliverySchedule $delivery)
    {
        $delivery->delete();

        return redirect()->route('admin.delivery.index')
            ->with('flash_message', '配信情報が削除されました');
    }
}
