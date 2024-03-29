@extends('layouts.app')

@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                            <img
                                src="/storage/uploads/{{$user->avatar}}"
                                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                style="width: 150px; z-index: 1">
                        </div>
                        <div class="ms-3" style="margin-top: 130px;">
                            <h5>{{$user->name}}</h5>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="p-4 text-black" style="background-color: #f8f9fa;">
                        <div class="d-flex justify-content-end text-center py-1">
                            <div>
                                <p class="mb-1 h5">{{ count($comments) }}</p>
                                <p class="small text-muted mb-0">Comments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
