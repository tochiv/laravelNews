@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('comment.update', $comment) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Edit</label>
                <textarea name="text" class="form-control" rows="3" required>{{ $comment->text }}</textarea>
            </div>
            <button class="btn btn-success">
                Edit
            </button>
        </form>
    </div>
@endsection
