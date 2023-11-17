@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="card p-4 border">
                    <p class="card-text fs-4 ">ユーザーネーム：{{ Auth::user()->name }}</p>
                    <p class="card-text fs-4 ">メールアドレス：{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    @endsection
