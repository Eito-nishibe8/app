@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>{{ $post['title'] }}</h1>
    </div>

    <div class=" mt-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/image/'.$post->image) }}" alt="..." style="width:350px;height: 350px; border-radius: 50px; background-color: #d3d3d3;">
            </div>
            <textarea class="card-body" style="border-radius: 20px; background-color: #d3d3d3;">
            {{ $post['episode'] }}
            </textarea>

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