@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card-header">
                    <div class="mb-3">
                        <h2 class="mb-4 mt-3">バナー編集</h2>
                    </div>
                </div>

                    <div class="card-body">
                        <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="banner Image" class="img-fluid">


                    <div class="mb-3 text-center">

                        <button type="submit" class="btn btn-primary btn-success">更新</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
