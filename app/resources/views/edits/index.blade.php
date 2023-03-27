@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>投稿編集</h1>
    </div>

    <div class="card mt-5" style="width: 70rem; height: 30rem">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="..." alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">概要</h5>
                    <p class="card-text">詳細コメント</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">

        <a href="{{ route('edits.index',1)}}">
            <button type="button" class="btn btn-dark btn-lg mr-5">投稿</button>
        </a>

    </div>

</div>
@endsection