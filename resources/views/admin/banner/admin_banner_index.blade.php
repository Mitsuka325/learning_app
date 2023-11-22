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
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>バナー</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <img src="{{ asset($banner->image) }}" alt="Banner Image">
                    
                        </td>
                       
                            <form action="{{ route('banner.destroy', $banner) }}" method="post">
                                @csrf
                                @method('delete')                                        
                                <button type="submit"class="btn btn-danger" >削除</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 
