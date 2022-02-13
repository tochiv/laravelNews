@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row vertical-center-row">
            @foreach($posts as $post)
                @if($post->approve == 1)
                <div class="card" style="width: 40rem; ">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->text}}</p>
                        <a style="width: 6rem" href="{{ route('admin.approve', $post) }}" class="btn btn-outline-success m-lg-3">Approve</a>
                        <a style="width: 7rem" href="{{ route('admin.disapprove', $post) }}" class="btn btn-outline-danger m-lg-3">Disapprove</a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
