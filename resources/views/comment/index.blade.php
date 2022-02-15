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
            @method('POST')
            <div class="mb-3">
                <label class="form-label">Comment</label>
                <textarea name="text" class="form-control" rows="3" required>
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
                @if(Auth::user() == $comment->user)
                    <a href="{{ route('comment.edit', $comment) }}" class="btn btn-primary">Edit</a>
                @endif
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $comments->links() }}
        </div>
    </div>
@endsection
