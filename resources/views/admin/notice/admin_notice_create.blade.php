@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card-header">
                    <div class="mb-3">
                        <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>
                        <h2 class="mb-4 mt-3">お知らせ設定</h2>
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

                    <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="lesson_name" class="col-sm-2 col-form-label">投稿日時</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" id="post_time" name="post_time">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="video_url" class="col-sm-2 col-form-label">タイトル</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-sm-2 col-form-label">本文</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                        </div>


                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-secondary btn-lg w-50">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection