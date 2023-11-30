@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card-header">
                    <div class="mb-3">
                        <h2 class="mb-4 mt-3">お知らせ編集</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('notice.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="lesson_name" class="col-sm-2 col-form-label">投稿日時</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" class="form-control" id="post_time" name="post_time"
                                        value="{{ $notice->post_time }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="video_url" class="col-sm-2 col-form-label">タイトル</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $notice->title }}">
                                </div>
                            </div>

                            <div class="mb-3
                                    row">
                                <label for="description" class="col-sm-2 col-form-label">本文</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ $notice->description }}</textarea>
                                </div>
                            </div>


                            <div class="mb-3 text-center">

                                <button type="submit" class="btn btn-primary btn-success">更新</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
