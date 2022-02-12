@extends('layouts.app')

@section('content')
    <div class="container">
        Do you want to create a new post? <a class="btn btn-success" href="{{ route('editor.create') }}">Create Post</a>
        <div class="row vertical-center-row">
            @foreach($user->posts as $post)
                @if($post->approve == 0)
                <div class="card" style="width: 40rem; ">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->text}}</p>
                        <form method="POST" action="{{ route('editor.destroy', $post) }}">
                            <a href="{{ route('editor.edit', $post) }}" class="btn btn-primary">Edit</a>
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">Delete</button>
                            <a class="btn btn-success" href="{{ route('editor.approve', $post) }}">Request for approve</a>
                        </form>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
