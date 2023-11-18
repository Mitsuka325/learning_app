
@extends('layouts.app')

@section('content')
    <div class="container-lg">
       <div class="row">
        <div class="mb-3">
            <div class="card-header">
            <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>

            <h2 class="mb-4 mt-3">授業一覧</h2>



<!-- 学年ボタン -->
<div class="col-md-2">
    <button onclick="showCourses('1')">小学1年生</button>
    <button onclick="showCourses('2')">小学2年生</button>
    <button onclick="showCourses('3')">小学3年生</button>
    <button onclick="showCourses('4')">小学4年生</button>
    <button onclick="showCourses('5')">小学5年生</button>
    <button onclick="showCourses('6')">小学6年生</button>
    <button onclick="showCourses('7')">中学1年生</button>
    <button onclick="showCourses('8')">中学2年生</button>
    <button onclick="showCourses('9')">中学3年生</button>
    <button onclick="showCourses('10')">高校1年生</button>
    <button onclick="showCourses('11')">高校2年生</button>
    <button onclick="showCourses('12')">高校3年生</button> 
</div>
 <!-- 授業内容の表示エリア -->
 <div class="course-container">
    @foreach($courses as $course)
    <a href="{{ route('admin.course.show', ['id' => $course->id]) }}"class="btn btn-primary">詳細</a>
    @endforeach
    <!-- ここに show.blade.php の内容を呼び出す -->
    {{-- @include('admin.course.show') --}}
</div>
</div>
@endsection


