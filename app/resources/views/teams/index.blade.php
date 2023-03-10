@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>tokyo社会人サッカーチーム</h1>
    </div>
    <div class="row justify-content-center my-5">

        <p class="d-flex align-items-center">検索・絞り込み　　　　　</p>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                エリア
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">千代田区</a>
                <a class="dropdown-item" href="#">中央区</a>
                <a class="dropdown-item" href="#">港区</a>
                <a class="dropdown-item" href="#">新宿区</a>
                <a class="dropdown-item" href="#">文京区</a>
                <a class="dropdown-item" href="#">台東区</a>
                <a class="dropdown-item" href="#">墨田区</a>
                <a class="dropdown-item" href="#">江東区</a>
                <a class="dropdown-item" href="#">品川区</a>
                <a class="dropdown-item" href="#">目黒区</a>
                <a class="dropdown-item" href="#">大田区</a>
                <a class="dropdown-item" href="#">世田谷区</a>
                <a class="dropdown-item" href="#">渋谷区</a>
                <a class="dropdown-item" href="#">中野区</a>
                <a class="dropdown-item" href="#">杉並区</a>
                <a class="dropdown-item" href="#">豊島区</a>
                <a class="dropdown-item" href="#">北区</a>
                <a class="dropdown-item" href="#">荒川区</a>
                <a class="dropdown-item" href="#">板橋区</a>
                <a class="dropdown-item" href="#">練馬区</a>
                <a class="dropdown-item" href="#">足立区</a>
                <a class="dropdown-item" href="#">葛飾区</a>
                <a class="dropdown-item" href="#">江戸川区</a>
            </div>
        </div>
        <div class="dropdown ml-5">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                レベル
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">初心者</a>
                <a class="dropdown-item" href="#">中級者</a>
                <a class="dropdown-item" href="#">上級者</a>
            </div>
        </div>
        <div class="dropdown ml-5">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                時間帯
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">昼</a>
                <a class="dropdown-item" href="#">夜</a>
            </div>
        </div>
        <a href="#" class="btn btn-outline-dark btn-sm-center ml-5">検索</a>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('teams.show',1)}}">
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <p class="card-text">杉並FC</p>
                    </div>
                    <svg class="bd-placeholder-img card-img-bottom" width="100%" height="300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                        <title>posts</title>
                        <rect width="100%" height="100%" fill="#868e96" /><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                    </svg>
                </div>
            </a>
        </div>
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <p class="card-text">練馬FC</p>
            </div>
            <svg class="bd-placeholder-img card-img-top" width="100%" height="300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                <title>posts</title>
                <rect width="100%" height="100%" fill="#868e96" /><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
            </svg>
        </div>
    </div>
</div>
@endsection