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

                        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label for="img_path" class="col-sm-2 col-form-label">サムネイル</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="img_path" name="img_path">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="grade" class="col-sm-2 col-form-label">学年</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" id="grade" name="grade_id">
                                        <option value="">選択してください</option>
                                        @foreach (App\Models\Grade::all() as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="lesson_name" class="col-sm-2 col-form-label">授業名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lesson_name" name="lesson_name">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="video_url" class="col-sm-2 col-form-label">動画URL</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="video_url" name="video_url">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="description" class="col-sm-2 col-form-label">授業概要</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="hidden" name="always_delivery_flg" value="false">
                                <input type="checkbox" class="form-check-input" id="always_delivery_flg" name="always_delivery_flg">
                                <label class="form-check-label" for="always_delivery_flg">常時公開する</label>
                            </div>

                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-secondary btn-lg w-50">登録</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
