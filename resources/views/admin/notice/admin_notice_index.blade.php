@extends('layouts.app')

@section('content')
    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 offset-md-1">
                <div class="card-header">
                    <div class="mb-3">
                        <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>
                        <h2 class="mb-4 mt-3">お知らせ一覧</h2>
                    </div>
                    <a href="{{ route('notice.create') }}" class="btn btn-primary mb-5">新規投稿</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>投稿日時</th>
                                <th>タイトル</th>
                                <th>
                                </th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $notice)
                                <tr>
                                    <td>{{ $notice->post_time->format('Y年m月d日') }}</td>
                                    <td>{{ $notice->title }}</td>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('notice.edit', $notice) }}"class="btn btn-primary btn-success">変更する</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('notice.destroy', $notice) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"class="btn btn-danger">削除</button>
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
