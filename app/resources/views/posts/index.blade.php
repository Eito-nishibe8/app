@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mb-3">
            <h1>一般マイページ</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-5 ml-5">
        @if(Auth::user()->icon==null)
        <img src="{{ asset('noImage.png') }}" class="img-circle" style="margin-right: 70px; width: 220px; height: 200px;">
        @else
        <img src="{{ asset('storage/image/'.Auth::user()->icon) }}" class="img-circle" style="margin-right: 70px; width: 220px; height: 200px;">
        @endif
        <div class="col">
            <h2 style="border: solid 6px #808080;padding: 1rem;">ユーザー名　　　　　　{{Auth::user()->name}}</h2>
            <h2 class="mt-5" style="border: solid 6px #808080;padding: 1rem;">メールアドレス　　　　{{Auth::user()->email}}</h2>
        </div>
    </div>

    <a href="{{ route('posts.edit',Auth::id() )}}">
        <div class="row">
            <button type="button" class="btn btn-dark btn-lg btn-block w-50 mx-auto">ユーザー情報変更</button>
        </div>
    </a>
    <div class="low mt-5 border-bottom border-dark"></div>
    <h3 class="row justify-content-center mt-3">いいねしたチーム</h3>

    <div class="row justify-content-center mt-5">
        @foreach($likes as $like)
        <div class="col">
            <div class="card mb-5" style="width: 30rem;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="">
                        <p class="card-text">{{$like->team->team_name}}</p>
                    </div>
                </div>
                <a href="{{ route('teams.show',$like->team_id)}}">
                    <img src="{{ asset('storage/image/'.$like->team->team_icon) }}" class="card-img-bottom" alt="">
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

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