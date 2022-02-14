@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @foreach($posts as $post)
                @if($post->approve == 2)
                    <div class="card" style="width: 40rem; ">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->text}}</p>
                        </div>
                        @if(Auth::user()->role_id = 3)
                            <form action="{{ route('admin.destroy', $post) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button style="width: 6rem; " class="btn btn-outline-danger m-lg-3" href="">Delete</button>
                            </form>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
