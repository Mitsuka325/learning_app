@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>授業設定登録完了</h2>
            <div class="alert alert-success" role="alert">
                授業の登録が完了しました。
            </div>

            <strong>サムネイル</strong><img src="{{ asset($course->image) }}" alt="サムネイル"><br>
            <strong>学年</strong>{{ $course->grade_id }}<br>
            <strong>授業名</strong>{{ $course->lesson_name }}<br>
            <strong>動画URL</strong>{{ $course->video_url }}<br>
            <strong>授業概要</strong>{{ $course->description }}<br>
            <strong>常時公開フラグ</strong>{{ $course->always_delivery_flg ? '常時公開' : '非常時公開' }}<br>
            
            <a href="{{ route('admin.course.index') }}" class="btn btn-secondary mt-3">戻る</a>
        </div>
    </div>
</div>
@endsection
