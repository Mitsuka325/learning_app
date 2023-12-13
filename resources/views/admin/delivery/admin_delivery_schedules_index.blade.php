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
                                            <td>

                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('admin.delivery.destroy', $delivery) }}"method="post">
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

                        <form action="{{ route('admin.delivery.store') }}" method="post" enctype="multipart/form-data"
                            id="deliveryForm" style="display: none;">
                            @csrf
                            <div class="d-flex justify-content-center align-items-center">
                                <input type="date" id="start_date" name="start_date" class="form-control">
                                <input type="time" id="start_time" name="start_time" class="form-control">～
                                <input type="date" id="end_date" name="end_date" class="form-control">
                                <input type="time" id="end_time" name="end_time" class="form-control">
                                <input type="hidden" id="course_id" name="course_id" value="{{ request()->input('course_id') }}">
                            </div>
                            <button type="submit" class="btn btn-secondary">登録</button>
                        </form>
                        <label for="showDeliveryForm" class="m-4 bg-success rounded-5 text-white" style="cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FFFFFF"
                                class="bg-success rounded-5" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                            </svg>
                        </label>

                        <script>
                            const showDeliveryLabel = document.querySelector('label[for="showDeliveryForm"]');
                            const showDeliveryForm = document.getElementById('showDeliveryForm');
                            const deliveryForm = document.getElementById('deliveryForm');

                            showDeliveryLabel.addEventListener('click', function(event) {
                                event.preventDefault();

                                if (deliveryForm.style.display === 'none') {
                                    deliveryForm.style.display = 'block';

                                } else {
                                    deliveryForm.style.display = 'none';

                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        @endsection
