@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>{{ $post['title'] }}</h1>
    </div>

    <div class=" mt-5" style="width: 70rem; height: 30rem">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/image/'.$post->image) }}" alt="...">
            </div>
            <div class="card col-md-8">
                <div class="card-body">
                    <p class="card-text">{{ $post['episode'] }}</p>
                </div>
            </div>
        </div>
    </div>
    @if($post->user_id==Auth::id())
    <div class="row justify-content-center mt-5">

        <a href="{{ route('postEdit',$post->id )}}">
            <button type="button" class="btn btn-dark btn-lg mr-5">編集</button>
        </a>

        <form action="{{ route('posts.destroy',$post->id )}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-lg ml-5">削除</button>
        </form>
    </div>
    @endif

</div>
@endsection