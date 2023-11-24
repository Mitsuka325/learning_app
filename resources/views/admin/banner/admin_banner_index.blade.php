@extends('layouts.app')

@section('content')
    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif

    <div class="card-header">
        <div class="mb-3">
            <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>
            <h2 class="mb-4 mt-3">バナー管理</h2>


            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td>
                                    <img src="{{ asset($banner->image) }}" alt="バナー画像">
                                </td>
                                <td>
                                    <form action="{{ route('admin.banner.destroy', $banner) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">
                                <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image" accept="image/*">
                                    <button type="submit" class="btn btn-primary mt-3">画像を追加</button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        @endsection
