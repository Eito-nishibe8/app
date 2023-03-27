@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="col">お問い合わせフォーム</h1>
    </div>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="team_id" id="exampleInputName1" value="{{$id}}">
        <div class="row mt-5" style="max-width: 900px">
            <label for="exampleInputName1" class="form-label">氏名 : {{Auth::user()->name}}</label>
        </div>

        <div class="row mt-5" style="max-width: 900px">
            <label for="exampleInputEmail1" class="form-label">メールアドレス : {{Auth::user()->email}}</label>
        </div>

        <div class="row mt-5" style="max-width: 900px">
            <label for="exampleInputTel1" class="form-label">電話番号 @error('tel')<span style='color:red'>※{{ $message }}</span>@enderror</label>
            <input type="tel" class="form-control" name="tel" id="exampleInputTel1">
        </div>

        <div class="row mt-5" style="max-width: 900px">
            <label for="exampleFormControlTextarea1" class="form-label">お問い合わせ内容 @error('message')<span style='color:red'>※{{ $message }}</span>@enderror</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-dark mt-5">送信</button>
    </form>
</div>
@endsection