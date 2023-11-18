@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin_index') }}" class="btn btn-secondary">戻る</a>
                        <h2 class="mb-0">授業設定</h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('class.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="img_path" class="form-label">サムネイル</label>
                                <input type="file" class="form-control" id="img_path" name="img_path">
                            </div>

                            {{-- <div class="mb-3">
                                <label for="grade" class="form-label">学年</label>
                                <select class="form-select" aria-label="Default select example" id="grade" name="grade">
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->grade }}">{{ $grade->grade}}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="mb-3">
                                <label for="lesson_name" class="form-label">授業名</label>
                                <input type="text" class="form-control" id="lesson_name" name="lesson_name">
                            </div>

                            <div class="mb-3">
                                <label for="video_url" class="form-label">動画URL</label>
                                <input type="text" class="form-control" id="video_url" name="video_url">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">授業概要</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_public" name="is_public">
                                <label class="form-check-label" for="is_public">常時公開する</label>
                            </div>

                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
