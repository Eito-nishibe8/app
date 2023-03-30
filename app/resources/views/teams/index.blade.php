@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Tokyo Football Buddies</h1>
    </div>
    <div class="row d-flex justify-content-around my-5">

        <form action="{{route('teams.index')}}">
            <div class="row">
                <h4 class="d-flex align-items-center">検索・絞り込み　　　　　</h4>


                <select name="area" class="dropdown" style="color:#000000;background-color: #a9a9a9;border: 1px solid black;border-radius: 5px;">
                    @if(!$area)
                    <option value="" selected>エリア</option>
                    @else
                    <option value="{{$area}}" selected>{{$area}}</option>
                    @endif
                    <option class="dropdown-item" value="千代田区">千代田区</option>
                    <option class="dropdown-item" value="中央区">中央区</option>
                    <option class="dropdown-item" value="港区">港区</option>
                    <option class="dropdown-item" value="新宿区">新宿区</option>
                    <option class="dropdown-item" value="文京区">文京区</option>
                    <option class="dropdown-item" value="台東区">台東区</option>
                    <option class="dropdown-item" value="墨田区">墨田区</option>
                    <option class="dropdown-item" value="江東区">江東区</option>
                    <option class="dropdown-item" value="品川区">品川区</option>
                    <option class="dropdown-item" value="目黒区">目黒区</option>
                    <option class="dropdown-item" value="大田区">大田区</option>
                    <option class="dropdown-item" value="世田谷区">世田谷区</option>
                    <option class="dropdown-item" value="渋谷区">渋谷区</option>
                    <option class="dropdown-item" value="中野区">中野区</option>
                    <option class="dropdown-item" value="杉並区">杉並区</option>
                    <option class="dropdown-item" value="豊島区">豊島区</option>
                    <option class="dropdown-item" value="北区">北区</option>
                    <option class="dropdown-item" value="荒川区">荒川区</option>
                    <option class="dropdown-item" value="板橋区">板橋区</option>
                    <option class="dropdown-item" value="練馬区">練馬区</option>
                    <option class="dropdown-item" value="足立区">足立区</option>
                    <option class="dropdown-item" value="葛飾区">葛飾区</option>
                    <option class="dropdown-item" value="江戸川区">江戸川区</option>
                </select>

                <select name="level" class="dropdown ml-5" style="color:#000000;background-color: #a9a9a9;border: 1px solid black;border-radius: 5px;">
                    @if(!$level)
                    <option value="" selected>レベル</option>
                    @else
                    <option value="{{$level}}" selected>{{$level}}</option>
                    @endif
                    <option class="dropdown-item" value="初心者">初心者</option>
                    <option class="dropdown-item" value="中級者">中級者</option>
                    <option class="dropdown-item" value="上級者">上級者</option>
                </select>

                <select name="time" class="dropdown ml-5" style="color:#000000;background-color: #a9a9a9;border: 1px solid black;border-radius: 5px;">
                    @if(!$time)
                    <option value="" selected>時間帯</option>
                    @else
                    <option value="{{$time}}" selected>{{$time}}</option>
                    @endif
                    <option class="dropdown-item" value="昼">昼</option>
                    <option class="dropdown-item" value="夜">夜</option>
                </select>

                <button type="submit" class="btn btn-outline-dark btn-sm-center ml-5">検索</button>
            </div>
        </form>
    </div>

    <div class="row justify-content-center">
        @foreach($teams as $team)
        <div class="col">
            <div class="card box51 text-dark border-dark mb-5" style="width: 30rem; border-radius: 50px; background-color: #fffaf0;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="">
                        <p class="card-text">{{$team->team_name}}</p>
                    </div>
                    @if($like_model->like_exist(Auth::user()->id,$team->id))
                    <div class="">
                        <button type="button" class="js-like-toggle loved btn" data-teamid="{{ $team->id }}">
                            <i class="fa-solid fa-thumbs-up fa-xl"></i>
                        </button>
                    </div>
                    @else
                    <div class="">
                        <button type="button" class="js-like-toggle loved btn" data-teamid="{{ $team->id }}">
                            <i class="fa-regular fa-thumbs-up fa-xl"></i>
                        </button>
                    </div>
                    @endif
                </div>
                <a href="{{ route('teams.show',$team->id )}}">
                    <img src="{{ asset('storage/image/'.$team['team_icon']) }}" class="card-img-bottom" style=" border-radius: 30px;" alt="">
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(function() {
        var like = $('.js-like-toggle');
        var likeTeamId;
        like.on('click', function() {
            var $this = $(this);
            var thumb = $(this).children('.fa-thumbs-up');
            likeTeamId = $this.data('teamid');
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/ajax_like', //routeの記述
                    type: 'POST', //受け取り方法の記述（GETもある）
                    data: {
                        'team_id': likeTeamId //コントローラーに渡すパラメーター
                    },
                    dataType: 'json',
                })

                // Ajaxリクエストが成功した場合
                .done(function(data) {
                    //lovedクラスを追加
                    thumb.toggleClass('fa-solid');
                    thumb.toggleClass('fa-regular');
                })
                // Ajaxリクエストが失敗した場合
                .fail(function(data, xhr, err) {
                    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
                    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                    console.log('エラー');
                });

            return false;
        });
    });
</script>
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

    /*背景色をつけて丸くする*/
    .box51 {
        margin: 2em auto;
        padding: 2em;
        /*内側余白*/
    }
</style>