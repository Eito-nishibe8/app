@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>チーム情報編集</h1>
    </div>
    <form action="{{ route('teams.update',Auth::user()->team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row justify-content-center mt-5 ml-5">
            <img src="{{ asset('storage/image/'.$team['team_icon']) }}" style="display: block; margin: auto;" class="img-circle" width="200" height="150">

            <div class="col-md-8 mt-5">
                <div class="card" style="width: 40rem;">
                    <div class="card-body"  style="color:#000000;background-color: #a9a9a9;border-radius: 5px;">

                        <div class="form-group row">
                            <label for="name" class="col-md-4"></label>

                            <div class="col-md-6">
                                <input id="name" type="file" name="team_icon" value="{{ old('team_icon') }}" autofocus>
                                <label for="exampleInputTel1" class="form-label"> @error('team_icon')<span style='color:red'>※{{ $message }}</span>@enderror</label>
                            </div>
                        </div>

                        <div class=" row form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('チーム名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="team_name" value="{{ old('team_name') }}" autofocus>
                                <label for="exampleInputTel1" class="form-label"> @error('team_name')<span style='color:red'>※{{ $message }}</span>@enderror</label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <select class="form-select" name="area">
                                <option value="" selected>エリア</option>
                                <option value="千代田区">千代田区</option>
                                <option value="中央区">中央区</option>
                                <option value="港区">港区</option>
                                <option value="新宿区">新宿区</option>
                                <option value="文京区">文京区</option>
                                <option value="台東区">台東区</option>
                                <option value="墨田区">墨田区</option>
                                <option value="江東区">江東区</option>
                                <option value="品川区">品川区</option>
                                <option value="目黒区">目黒区</option>
                                <option value="大田区">大田区</option>
                                <option value="世田谷区">世田谷区</option>
                                <option value="渋谷区">渋谷区</option>
                                <option value="中野区">中野区</option>
                                <option value="杉並区">杉並区</option>
                                <option value="豊島区">豊島区</option>
                                <option value="北区">北区</option>
                                <option value="荒川区">荒川区</option>
                                <option value="板橋区">板橋区</option>
                                <option value="練馬区">練馬区</option>
                                <option value="足立区">足立区</option>
                                <option value="葛飾区">葛飾区</option>
                                <option value="江戸川区">江戸川区</option>
                            </select>

                            <select class="form-select" name="level">
                                <option value="" selected>レベル</option>
                                <option value="初心者">初心者</option>
                                <option value="中級者">中級者</option>
                                <option value="上級者">上級者</option>
                            </select>

                            <select id="time" class="form-select" name="time">
                                <option value="" selected>時間帯</option>
                                <option value="昼">昼</option>
                                <option value="夜">夜</option>
                            </select>
                        </div>
                        @error('area')
                        <div class="row justify-content-center">
                            <p style="color:red">※{{$message}}</p>
                        </div>
                        @enderror

                        @error('level')
                        <div class="row justify-content-center">
                            <p style="color:red">※{{$message}}</p>
                        </div>
                        @enderror

                        @error('time')
                        <div class="row justify-content-center">
                            <p style="color:red">※{{$message}}</p>
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">プロフィール @error('profile')<span style="color:red">※{{$message}}</span>@enderror</label>
                            <textarea class="form-control" style="resize: none;" id="exampleFormControlTextarea1" rows="3" name="profile" value="{{ old('profile') }}"></textarea>
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
</div>


@endsection
<style>
    img {
        width: 180px;
        height: 300px;
        object-fit: cover;
    }

    .img-circle {
        width: 220px;
        height: 220px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>