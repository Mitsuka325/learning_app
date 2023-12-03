@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">
                    <div class="mb-3">

                        <h2 class="mb-4 mt-3">授業編集</h2>
                    </div>
                </div>
                    <div class="card-body">
                     <form action="{{ route('admin.course.update',[$course->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="img_path" class="col-sm-2 col-form-label">サムネイル</label>
                            <img src="{{ asset('storage/images/' . $course->image) }}" alt="course Image" class="img-fluid">

                            <div class="mb-3">
                                <label for="new_image" class="form-label">新しい画像を選択</label>
                                <input type="file" class="form-control" id="new_image" name="new_image">
                            </div>
                    <div class=" mb-3">
                        <label for="grade" class="form-label">学年</label>
                        <select class="form-select" aria-label="Default select example" id="grade" name="grade_id">
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}" @if($course->grade->id === $grade->id) selected @endif>
                                    {{ $grade->grade_name }}
                                </option>
                            @endforeach
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
                        <form id="deleteForm" action="{{ route('admin.course.destroy', [$course->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-course" data-course-id="{{ $course->id }}">削除</button>
                        </form>

<script>
        const deleteButtons = document.querySelectorAll('.delete-course');
        deleteButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                if (confirm('本当にこのコースを削除しますか？')) {
                    let courseId = event.target.dataset.courseId; 
                fetch(`/admin/courses/${courseId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // 成功時の処理（リダイレクトなど）
                        window.location.reload();
                    } else {
                        // エラー時の処理
                        alert('削除に失敗しました');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
    </script>
                        <a href="{{ route('admin.course.index') }}" style="font-size: 18px; color:black;">←戻る</a>
                    </div>    
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
