@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('editor')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </form>

        @foreach($users as $user)
            @foreach($user->posts as $post)

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->text}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>


@endsection
