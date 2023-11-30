@extends('layouts.app')

@section('content')
    @if (session('flash_message'))
            <p class="ms-4">{{session('flash_message')}}</p>
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
                                    <img src="{{ asset('storage/'.$banner->image) }}" alt="バナー画像" style="width:100px">
                                </td>
                                <td>
                                    <form action="{{ route('admin.banner.destroy', $banner) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-dash-circle"></i> 
                                
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">
                                <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image" accept="image/*">
                                    <button type="submit" class="btn btn-success mt-3">
                                        <i class="bi bi-plus-circle"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        @endsection
