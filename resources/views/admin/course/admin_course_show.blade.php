@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">
                    <div class="mb-3">

                        <h2 class="mb-4 mt-3">授業詳細</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="img_path" class="col-sm-2 col-form-label">サムネイル</label>
                            <img src="{{ asset('storage/' . $course->image) }}" alt="course Image" class="img-fluid">

                    </div>

                    <div class=" mb-3">
                        <label for="grade" class="form-label">学年</label>
                        <select class="form-select" aria-label="Default select example" id="grade" name="grade_id"
                            disabled>
                            <option value="{{ $course->grade->id }}">{{ $course->grade->grade_name }}</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="lesson_name" class="form-label">授業名</label>
                        <input type="text" class="form-control" id="lesson_name" name="lesson_name" disabled
                            value="{{ $course->lesson_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="video_url" class="form-label">動画URL</label>
                        <input type="text" class="form-control" id="video_url" name="video_url" disabled
                            value="{{ $course->video_url }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">授業概要</label>
                        <textarea class="form-control" id="description" name="description"disabled rows="3">
                                {{ trim($course->description) }}</textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="always_delivery_flg" name="always_delivery_flg" {{ $course->always_delivery_flg ? 'checked' : '' }} disabled>
                        <label class="form-check-label" for="always_delivery_flg">常時公開する</label>
                    </div>

                    <div class="mb-3 text-center">
                        <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
