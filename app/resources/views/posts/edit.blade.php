@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>ユーザー情報編集</h1>
    </div>
</div>

<form action="{{ route('posts.update',$id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row justify-content-center mt-5 ml-5">
        @if(Auth::user()->icon==null)
        <img src="{{ asset('noImage.png') }}" style="display: block; margin: auto;" class="img-circle" width="200" height="150">
        @else
        <img src="{{ asset('storage/image/'.Auth::user()->icon ) }}" class="img-circle" width="200" height="150">
        @endif
        <div class="col-md-8 mt-5">
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4"></label>

                        <div class="col-md-6">
                            <input type="file" class="@error('icon') is-invalid @enderror" name="icon" value="{{ old('icon') }}" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名') }}</label>

                        <div class="col-md-6">
                            <label for="exampleInputTel1" class="form-label"></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , Auth::user()->name )}}" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email' , Auth::user()->email )}}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('変更') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
<style>
    img {
        width: 180px;
        height: 300px;
        object-fit: cover;
    }

    .img-circle {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>