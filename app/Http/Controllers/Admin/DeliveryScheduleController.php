<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliverySchedule;
use Illuminate\Http\Request;
use App\Http\Requests\DeliveryStoreRequest;

class DeliveryScheduleController extends Controller
{
    public function index()
    {
        $deliveries = DeliverySchedule::all();
        return view('admin.delivery.admin_delivery_schedules_index', compact('deliveries'));
    }

    public function create()
    {
        return view('admin.delivery.admin_delivery_schedules_create');
    }

    public function store(DeliveryStoreRequest $request)
    {
        $validated=$request->validated();

        $delivery = new DeliverySchedule();

        $delivery->start_date = $validated['start_date'];
        $delivery->start_time = $validated['start_time'];
        $delivery->end_date = $validated['end_date'];
        $delivery->end_time = $validated['end_time'];

        $delivery->save();

        return redirect()->route('admin.course.index')->with('success', '配信情報が保存されました！');
    }

       

    // public function show(DeliverySchedule $schedule)
    // {
    //     return view('admin.delivery-schedules.show', compact('schedule'));
    // }

    // public function edit(DeliverySchedule $schedule)
    // {
    //     return view('admin.delivery-schedules.edit', compact('schedule'));
    // }

    // public function update(Request $request, DeliverySchedule $schedule)
    // {
    //     // バリデーションなどの適切な処理を追加

    //     $schedule->update($request->all());

    //     return redirect()->route('admin.delivery-schedules.index')
    //         ->with('flash_message', '配信情報が更新されました');
    // }

    public function destroy(DeliverySchedule $delivery)
    {
        $delivery->delete();

        return redirect()->route('admin.delivery.index')
            ->with('flash_message', '配信情報が削除されました');
    }
}