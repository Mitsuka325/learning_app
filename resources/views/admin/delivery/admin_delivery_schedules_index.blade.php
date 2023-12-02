@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card-header">
                    <div class="mb-3">
                        <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>
                        <h2 class="mb-4 mt-3">配信日時設定</h2>
                    </div>
                </div>

                <div class="card-body">
                    {{-- <!-- 配信日時設定フォーム -->
                    <form action="{{ route('admin.delivery.store') }}" method="POST" class="d-flex flex-wrap">
                        @csrf --}}
    
                        <div class="mb-3 me-3">
                            <label for="start_date" class="form-label">開始日</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
    
                        <div class="mb-3 me-3">
                            <label for="start_time" class="form-label">開始時間</label>
                            <input type="time" class="form-control" id="start_time" name="start_time">
                        </div>
    
                        <div class="mb-3 me-3">
                            <label for="end_date" class="form-label">終了日</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
    
                        <div class="mb-3 me-3">
                            <label for="end_time" class="form-label">終了時間</label>
                            <input type="time" class="form-control" id="end_time" name="end_time">
                        </div>
    
                        <button type="submit" class="btn btn-primary">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
