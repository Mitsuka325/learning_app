@extends('layouts.app')

@section('content')
    <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black; margin-left: 20px;">←戻る</a>
    <h2 class="mb-4 mt-3" style=" margin-left: 20px;">授業一覧</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <a href="{{ route('admin.course.create') }}" class="btn btn-primary m-4 mb-5">新規登録</a>
                    @if (request()->has('grade'))
                        <h2 class="mb-4 ms-5 mx-auto bg-primary  btn btn-outline-primary gap-2 nav-link pt-2 text-white"
                            style="width: fit-content; font-size: 20px; padding: 10px 20px;">
                            {{ \App\Models\Grade::find(request()->query('grade'))?->grade_name }}</h2>
                    @endif
                </div>
                <div class="text-end mb-3">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-lg-2 bg-body-tertiary">


                            <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-primary  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=1" style="width: fit-content; display: inline-block;">
                                            小学1年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-primary  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=2" style="width: fit-content; display: inline-block;">
                                            小学2年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-primary  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=3" style="width: fit-content; display: inline-block;">
                                            小学3年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-primary  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=4" style="width: fit-content; display: inline-block;">
                                            小学4年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-primary  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=5" style="width: fit-content; display: inline-block;">
                                            小学5年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-primary  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=6" style="width: fit-content; display: inline-block;">
                                            小学6年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-info  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=7" style="width: fit-content; display: inline-block;">
                                            中学1年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-info  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=8" style="width: fit-content; display: inline-block;">
                                            中学2年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-info  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=9" style="width: fit-content; display: inline-block;">
                                            中学3年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-success  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=10" style="width: fit-content; display: inline-block;">
                                            高校1年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-success  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=11" style="width: fit-content; display: inline-block;">
                                            高校2年生
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="align-items-center bg-success  btn btn-outline-primary d-flex gap-2 nav-link pt-3 rounded-5 text-white"
                                            href="courses?grade=12" style="width: fit-content; display: inline-block;">
                                            高校3年生
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                            <div class="d-flex justify-content-center align-items-center flex-column">

                            </div>
                            <div>

                                <div class="row">
                                    @foreach ($courses ?? [] as $course)
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <br>
                                                <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top"
                                                    alt="バナー画像" style="width: 50%">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->lesson_name }}</h5>
                                                    @if ($course->always_delivery_flg)
                                                        <p>常時公開</p>
                                                    @endif
                                                    @foreach ($course->deliverySchedules as $deliverySchedule)
                                                        <p>{{ \Illuminate\Support\Carbon::parse($deliverySchedule->start_date)->format('n月j日 H:i') }}～{{ \Illuminate\Support\Carbon::parse($deliverySchedule->end_date)->format('H:i') }}
                                                        </p>
                                                    @endforeach
                                                    <a href="{{ route('admin.course.edit', $course->id) }}"
                                                        class="btn btn-primary">授業内容編集</a>
                                                    <a href="{{ route('admin.delivery.index', ['course_id' => $course->id, 'lesson_name' => $course->lesson_name]) }}"
                                                        class="btn btn-primary">配信日時編集</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            @endsection
