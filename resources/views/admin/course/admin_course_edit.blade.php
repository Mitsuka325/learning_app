@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">
                    <div class="mb-3">

                        <h2 class="mb-4 mt-3">授業編集</h2>
                    </div>
                    <div class="card-body">
                     <form action="{{ route('admin.course.update',$course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="img_path" class="col-sm-2 col-form-label">サムネイル</label>
                            <img src="{{ asset('storage/' . $course->image) }}" alt="course Image" class="img-fluid">

                     </div>

                    <div class=" mb-3">
                        <label for="grade" class="form-label">学年</label>
                        <select class="form-select" aria-label="Default select example" id="grade" name="grade_id">
                            <option value="{{ $course->grade->id }}">{{ $course->grade->grade_name }}</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="lesson_name" class="form-label">授業名</label>
                        <input type="text" class="form-control" id="lesson_name" name="lesson_name"
                            value="{{ $course->lesson_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="video_url" class="form-label">動画URL</label>
                        <input type="text" class="form-control" id="video_url" name="video_url"
                            value="{{ $course->video_url }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">授業概要</label>
                        <textarea class="form-control" id="description" name="description" rows="3">
                                {{ trim($course->description) }}</textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_public" name="is_public">
                        <label class="form-check-label" for="is_public">常時公開する</label>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary btn-success">更新</button>
                        <button class="btn btn-danger delete-course"
                                                data-course-id="{{ $course->id }}">削除</button>
                        <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
