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

                <h2>バナー登録完了</h2>
                <div class="alert alert-success" role="alert">
                    <p>バナーの登録が完了しました。</p>
                </div>

                <img src="{{ asset($banner->image) }}" alt="バナー画像">

                <a href="{{ route('admin.course.index') }}" class="btn btn-secondary mt-3">戻る</a>
            </div>
        </div>
    </div>
@endsection
