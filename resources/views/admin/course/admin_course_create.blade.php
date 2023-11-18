@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">
                    <div class="mb-3">
                        <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>

                        <h2 class="mb-4 mt-3">授業設定</h2>
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

                        <form action="{{ route('couse.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <label for="img_path" class="col-sm-2 col-form-label">サムネイル</label>
                                <input type="file" class="form-control" id="img_path" name="img_path">
                            </div>

                            <div class=" mb-3">
                                <label for="grade" class="form-label">学年</label>
                                <select class="form-select" aria-label="Default select example" id="grade"
                                    name="grade">
                                    @foreach (App\Models\Grade::all() as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                                    @endforeach
                                </select>
                            </div>

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

                            <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-secondary btn-lg w-50">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
