@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>新規投稿</h1>
    </div>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mt-3">
            <label for="name" class="col-md-4 col-form-label text-md-right ml-5">{{ __('タイトル') }}</label>

            <div class="col-md-3">
                <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>
                <label for="exampleFormControlTextarea1" class="form-label">@error('title')<span style='color:red'>※{{ $message }}</span>@enderror</label>
            </div>
        </div>

        <div class="card mx-auto mt-5" style="border-radius: 20px; background-color: #d3d3d3; max-width: 900px; height: 400px">
            <div class="row no-gutters">
                <div class="col mt-5">
                    <input id="name" type="file" name="image" value="{{ old('image') }}">
                    <label for="exampleFormControlTextarea1" class="form-label">@error('image')<span style='color:red'>※{{ $message }}</span>@enderror</label>
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="border-radius: 20px; background-color: #d3d3d3;">
                        <textarea class="form-control" style="resize: none; height: 330px" id="exampleFormControlTextarea1" rows="3" name="episode" value="{{ old('episode') }}"></textarea>
                        <label for="exampleFormControlTextarea1" class="form-label">@error('episode')<span style='color:red'>※{{ $message }}</span>@enderror</label>
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