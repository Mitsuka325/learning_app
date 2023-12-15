@extends('layouts.app')

@section('content')
    @if (session('flash_message'))
        <p class="ms-4">{{ session('flash_message') }}</p>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 offset-md-1">
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
                                                <img src="{{ asset('storage/' . $banner->image) }}" alt="バナー画像"
                                                    style="width:100px">
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.banner.update', $banner->id) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <input type="file" name="image" accept="image/*"
                                                        onclick="document.getElementById('updateBtn').classList.remove('d-none');">
                                                    <button type="submit" class="btn btn-secondary d-none"
                                                        id="updateBtn">更新</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.banner.destroy', $banner) }}"method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="bg-white border-0" id="testTwo">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                            height="30" fill="#FFFFFF" class="bg-danger rounded-5"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                                        </svg>
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                        <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="fileInput" class="m-4 bg-success rounded-5 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FFFFFF"
                                        class="bg-success rounded-5" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                    <input type="file" id="fileInput" name="image" style="display: none">
                                </label>

                                <div class="text-center flex-grow-1">
                                    <button type="submit" class="btn btn-secondary" id="testTwo">登録</button>
                                </div>
                            </div>
                        </form>
                        <script>
                            document.getElementById('fileInput').click();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endsection
