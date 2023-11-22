@extends('layouts.app')

@section('content')
    <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>
    <h2 class="mb-4 mt-3">授業一覧</h2>
    </div>
    <a href="{{ route('admin.course.create') }}" class="btn btn-primary mb-5">新規投稿</a>
    </div>
    {{-- {{ request()->query('grade') }} --}}
    {{ \App\Models\Grade::find(request()->query('grade'))?->grade_name }}
    <div class="text-end mb-3">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 bg-body-tertiary">


                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                                href="courses?grade=1">
                                小学1年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=2">
                                小学2年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=3">
                                小学3年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=4">
                                小学4年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=5">
                                小学5年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=6">
                                小学6年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=7">
                                中学1年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=8">
                                中学2年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=9">
                                中学3年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=10">
                                高校1年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=11">
                                高校2年生
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 pt-3" href="courses?grade=12">
                                高校3年生
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <h2 class="text-center mb-5">タイトル</h2>
            </div>
            <div>
                <div class="mb-3 row">
                    @foreach ($courses ?? [] as $course)
                        <div class="col-4">{{ $course->lesson_name }}</div>
                    @endforeach
                    @foreach ($courses ?? [] as $course)
                        <div class="col-4">{{ $course->lesson_name }}</div>
                    @endforeach
                    @foreach ($courses ?? [] as $course)
                        <div class="col-4">{{ $course->lesson_name }}</div>
                    @endforeach
                </div>
                <div class="mb-3 row">
                    @foreach ($courses ?? [] as $course)
                        <div class="col-4">{{ $course->lesson_name }}</div>
                    @endforeach
                    @foreach ($courses ?? [] as $course)
                        <div class="col-4">{{ $course->lesson_name }}</div>
                    @endforeach
                    @foreach ($courses ?? [] as $course)
                        <div class="col-4">{{ $course->lesson_name }}</div>
                    @endforeach

                </div>

                <!-- 授業内容の表示エリア -->
                <div class="course-container">
                    @foreach ($courses as $course)
                    @endforeach
                    <a href="{{ route('admin.course.edit', $course) }}"class="btn btn-primary btn-success">編集</a>
                    <button class="btn btn-danger delete-course" data-course-id="{{ $course->id }}">削除</button>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
