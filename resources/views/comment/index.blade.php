@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="width: 40rem; ">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->text}}</p>
                    </div>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('comment.create', $post) }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Comment</label>
                <textarea name="text" class="form-control" rows="3">
            </textarea>
            </div>
            <button class="btn btn-success">
                Comment
            </button>
        </form>

        @foreach($comments as $comment)
        <div class="card mt-4">
            <div class="card-header">
                User: {{ $comment->user->name}}
            </div>
            <div class="card-body">
                <p class="card-text">{{ $comment->text }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
