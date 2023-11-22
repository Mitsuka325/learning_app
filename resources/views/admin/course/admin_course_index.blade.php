@extends('layouts.app')

@section('content')
<a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>
<h2 class="mb-4 mt-3">授業一覧</h2>
<div class="text-end mb-3">
</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                                            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1"
                                                id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                                                

                                                <div
                                                    class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2 active"
                                                                aria-current="page" href="#">
                                                                小学1年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                小学2年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                小学3年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                小学4年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                小学5年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                小学6年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                中学1年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                中学2年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                中学3年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                高校1年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                高校2年生
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center gap-2"
                                                                href="#">
                                                                高校3年生
                                                            </a>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                                <h2>タイトル</h2>
                                            </div>
                                            <div>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. In dicta nihil
                                                nobis perspiciatis aliquam consectetur asperiores ipsam esse ducimus.
                                                Facilis sint enim necessitatibus cupiditate iusto debitis consectetur non
                                                voluptate minima.
                                            </div>

                                        </main>
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

 <!-- 授業内容の表示エリア -->
 <div class="course-container">
    @foreach($courses as $course)
    <a href="{{ route('admin.course.show', ['id' => $course->id]) }}"class="btn btn-primary">詳細</a>
    @endforeach
    <a href="{{ route('admin.course.edit', $course) }}"class="btn btn-primary btn-success">編集</a>
    <button class="btn btn-danger delete-course"
                                        data-course-id="{{ $course->id }}">削除</button>
</div>
</div>

