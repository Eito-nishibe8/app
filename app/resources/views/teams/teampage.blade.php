@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mb-3">
            <h3>チームマイページ</h3>
        </div>
    </div>
    <div class="row justify-content-center mt-5 ml-5">

        <img src="{{ asset('storage/image/'.$team['team_icon']) }}" class="img-circle" alt="参考画像" width="200" height="150">
        <div class="col ml-5">
            <h3>チーム名　　　　{{ $team['team_name'] }}</h3>
            <h3 class="mt-5">エリア　　　　　{{ $team['area'] }}</h3>
            <h3 class="mt-5">レベル　　　　　{{ $team['level'] }}</h3>
            <h3 class="mt-5">時間帯　　　　　{{ $team['time'] }}</h3>
        </div>
        <div class="col-md-8 mt-5">
            <div class="row">
                <div class="card border-dark ml-5" style="width: 35rem;">
                    プロフィール　　　　{{ $team['profile'] }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <a href="{{ route('teams.edit',Auth::user()->team->id )}}">
            <button type="button" class="btn btn-dark btn-lg ">チーム情報変更</button>
        </a>
        <a href="{{ route('posts.create' )}}">
            <button type="button" class="btn btn-dark btn-lg ml-5">新規投稿</button>
        </a>
        <a href="{{ route('contacts.index' )}}">
            <button type="button" class="btn btn-dark btn-lg ml-5">お問い合わせ一覧</button>
        </a>
    </div>
    <div class="low mt-5 border-bottom border-dark"></div>
    <h3 class="row justify-content-center mt-3">チーム投稿</h3>

    <div class="row justify-content-around">
        @foreach($posts as $post)
        <a href="{{ route('posts.show',$post->id )}}" class='col-4 border-dark card' style="padding: 0px;">
            <img src="{{ asset('storage/image/'.$post->image) }}" style="width: 100%" alt="" class="card-img">
            <div class="card-body">
                <p class="card-text">{{$post->title}}</p>
            </div>
        </a>
        @endforeach
    </div>

</div>
@endsection
<style>
    .card-img {
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