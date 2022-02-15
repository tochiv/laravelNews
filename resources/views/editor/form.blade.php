@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST"
              @if(isset($post))
                action="{{ route('editor.update', $post) }}"
              @else
                action="{{ route('editor.store') }}"
              @endif
        >
            @csrf
            @isset($post)
                @method('PUT')
            @endisset
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input value="{{ isset($post) ? $post->title : null }}"
                       name="title" type="text" class="form-control"  placeholder="Title" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Text</label>
                <textarea name="text" class="form-control" rows="3" required>
                    {{ isset($post) ? $post->text : null }}
                </textarea>
            </div>

            <button class="btn btn-success">
                {{isset($post) ? 'Edit' : 'Create'}}
            </button>
        </form>
    </div>
@endsection
