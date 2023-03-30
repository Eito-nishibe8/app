@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>投稿編集</h1>
    </div>

    <form action="{{ route('postUpdate',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mt-3">
            <label for="name" class="col-md-4 col-form-label text-md-right ml-5">{{ __('タイトル') }}</label>

            <div class="col-md-3">
                <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$post->title) }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="card mx-auto mt-5" style="border-radius: 50px; background-color: #d3d3d3;">
            <div class="row">
                <div class="col-md-4 mt-5">
                    <input id="name" type="file" name="image" value="{{ old('image') }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <textarea class="form-control" style=" height: 350px;border: 1px solid gray; border-radius: 20px; background-color: #d3d3d3;" id="exampleFormControlTextarea1" rows="3" name="episode">{{old('episode',$post->episode)}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <button type="submit" class="btn btn-dark btn-lg mr-5">投稿</button>
        </div>
    </form>
</div>
@endsection