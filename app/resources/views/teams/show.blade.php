@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <img src="{{$team->team_icon ? asset('storage/image/'.$team->team_icon) : asset('storage/noImage.png')}}" class="img-circle" alt="" width="200" height="150">
        <div class="col mb-3">
            <h1>チーム名　　：　　{{$team->team_name}}</h1>
            <h2 class="mt-5">エリア　　　：　　{{$team->area}}</h2>
            <h2 class="mt-5">レベル　　　：　　{{$team->level}}</h2>
            <h2 class="mt-5">時間帯　　　：　　{{$team->time}}</h2>
        </div>
        <div class="col">
            <button type="button" class="btn btn-link d-flex align-items-start float-right">戻る</button>
        </div>
    </div>
    <div class="col-md-8 mx-auto">
        <div class="card">
            {{$team->profile}}
        </div>
    </div>
    <div class="col mt-5 border-bottom border-dark"></div>

    <div class="row justify-content-center">
        @foreach($team->posts as $post)
        <div class="col">
            <div class="card mt-5" style="width: 30rem;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="">
                        <p class="card-text">{{$post->title}}</p>
                    </div>
                </div>
                <a href="{{ route('posts.show',$post->id )}}">
                    <img src="{{ asset('storage/image/'.$post->image) }}" class="card-img-bottom" alt="">
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('contacts.create',$team->id )}}">
        <div class="fixed-bottom mx-0 bg-secondary text-center text-dark opacity-25" height="100">
            <button>お問い合わせフォーム</button>
        </div>
    </a>
</div>
@endsection
<style>
    img {
        width: 180px;
        height: 300px;
        object-fit: cover;
    }
    .img-circle{
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius:50%;
    }
</style>