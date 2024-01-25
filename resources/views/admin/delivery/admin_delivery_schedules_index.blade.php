@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">
                    <div class="mb-3">
                        <a href="{{ route('admin_index') }}" style="font-size: 18px; color:black;">←戻る</a>
                        <h2 class="mb-4 mt-3">配信日時設定</h2>
                        @if (isset($lessonName))
                            <p>{{ $lessonName }}</p>
                        @endif
                        @if (session('flash_message'))
                            <div class="alert alert-success">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-3 me-3">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($deliveries as $delivery)
                                        <tr>
                                            <td>
                                                <p>開始日時:
                                                    {{ \Illuminate\Support\Carbon::parse($delivery->start_date)->toDateString() }}
                                                    {{ \Illuminate\Support\Carbon::parse($delivery->start_time)->toTimeString() }}～終了日時:
                                                    {{ \Illuminate\Support\Carbon::parse($delivery->end_date)->toDateString() }}{{ \Illuminate\Support\Carbon::parse($delivery->end_time)->toTimeString() }}
                                                </p>
                                            </td>
                                            <td></td>
                                            <td>
                                                <form action="{{ route('admin.delivery.destroy', $delivery) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class=" delete-btn bg-white border-0"
                                                        data-delivery-id="{{ $delivery->id }}">
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

                        <div id="formContainer">
                            <form action="{{ route('admin.delivery.store') }}" method="post" enctype="multipart/form-data"
                                class="deliveryForm" style="display: none;">
                                @csrf
                                <div class="d-flex justify-content-center align-items-center">
                                    <input type="date" name="start_date" class="form-control">
                                    <input type="time" name="start_time" class="form-control">～
                                    <input type="date" name="end_date" class="form-control">
                                    <input type="time" name="end_time" class="form-control">
                                    <input type="hidden" name="course_id" value="{{ request()->input('course_id') }}">

                                </div>
                            </form>
                        </div>

                        <button type="button" class="m-4 bg-success rounded-circle text-white p-0"
                        style="cursor: pointer; width: 40px; height: 40px; border:none;" onclick="duplicateForm()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FFFFFF"
                            class="bg-success rounded-circle" viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                    </button>
                    <button type="button" class="btn btn-secondary submit-all-btn">登録</button>
    
                    <script>
                        function duplicateForm() {
                            if(document.querySelector('.deliveryForm').style.display=='none'){
                                document.querySelector('.deliveryForm').style.display='block';
                            }
                            else{
                            const original = document.querySelector('.deliveryForm');
                            const clone = original.cloneNode(true);
                            clone.style.display = 'block';
                            document.getElementById('formContainer').appendChild(clone);
                            document.querySelector('.submit-all-btn').style.display = 'block';
                        }
                    }
    
                        function submitAllForms() {
                            const forms = document.querySelectorAll('#formContainer form');
                            forms.forEach(function(form,index) {
                                const data = new FormData(form);
                                const url = form.getAttribute('action');
                                fetch(url, {
                                        method: 'POST',
                                        body: data
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Network response was not ok');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        if(index===0){
                                        alert(data.success);
                                        }
                                        location.reload();
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('エラーが発生しました');
                                    });
                            });
                        }
    
                        document.addEventListener('click', function(event) {
                            if (event.target.classList.contains('submit-all-btn')) {
                                submitAllForms();
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    @endsection