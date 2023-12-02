<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliverySchedule;
use Illuminate\Http\Request;


class DeliveryScheduleController extends Controller
{
    public function index()
    {
        $deliveries = DeliverySchedule::all();
        return view('admin.delivery.admin_delivery_schedules_index', compact('deliveries'));
    }

    public function create()
    {
        return view('admin.delivery-schedules.create');
    }

    public function store(Request $request)
    {
        // バリデーションなどの適切な処理を追加

        DeliverySchedule::create($request->all());

        return redirect()->route('admin.delivery-schedules.index')
            ->with('flash_message', 'デリバリースケジュールが作成されました');
    }

    public function show(DeliverySchedule $schedule)
    {
        return view('admin.delivery-schedules.show', compact('schedule'));
    }

    public function edit(DeliverySchedule $schedule)
    {
        return view('admin.delivery-schedules.edit', compact('schedule'));
    }

    public function update(Request $request, DeliverySchedule $schedule)
    {
        // バリデーションなどの適切な処理を追加

        $schedule->update($request->all());

        return redirect()->route('admin.delivery-schedules.index')
            ->with('flash_message', 'デリバリースケジュールが更新されました');
    }

    public function destroy(DeliverySchedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.delivery-schedules.index')
            ->with('flash_message', 'デリバリースケジュールが削除されました');
    }
}