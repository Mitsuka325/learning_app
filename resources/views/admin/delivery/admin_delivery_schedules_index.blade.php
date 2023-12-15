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
                                                <form action="{{ route('admin.delivery.destroy', $delivery) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="bg-white border-0" id="testTwo">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FFFFFF" class="bg-danger rounded-5" viewBox="0 0 16 16">
                                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
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
                            <form action="{{ route('admin.delivery.store') }}" method="post" enctype="multipart/form-data" class="deliveryForm" style="display: none;">
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

                        <label for="showDeliveryForm" class="m-4 bg-success rounded-5 text-white" style="cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FFFFFF" class="bg-success rounded-5" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                            </svg>
                        </label>
                        <button type="button" class="btn btn-secondary submit-all-btn">登録</button>

                        <script>
                            const showDeliveryLabel = document.querySelector('label[for="showDeliveryForm"]');
                            showDeliveryLabel.addEventListener('click', function() {
                                duplicateForm();
                            });

                            function duplicateForm() {
                                const original = document.querySelector('.deliveryForm');
                                const clone = original.cloneNode(true);
                                clone.style.display = 'block';
                                document.getElementById('formContainer').appendChild(clone);
                                clone.querySelector('.submit-btn').addEventListener('click', function() {
                                    submitForm(clone);
                                });
                            }

                            function submitForm(form) {
                                const data = new FormData(form);
                                fetch('http://localhost/Learning_app/public/admin/delivery/store ', {
                                    method: 'POST',
                                    body: data
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log('Success:', data);
                                    
                                })
                                .catch((error) => {
                                    console.error('Error:', error);
                        
                                });
                            }

                            function submitAllForms() {
                                const forms = document.querySelectorAll('#formContainer form');
                                forms.forEach(function(form) {
                                    submitForm(form);
                                });
                            }

                            document.addEventListener('click', function(event) {
                                if (event.target.classList.contains('submit-btn')) {
                                    submitForm(event.target.closest('form'));
                                } else if (event.target.classList.contains('submit-all-btn')) {
                                    submitAllForms();
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
