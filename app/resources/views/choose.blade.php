@extends('layouts.app')

@section('content')
<div class="container m-auto">
    
            <div class="d-flex justify-content-around">
                <a href="{{route('register')}}" class="btn btn-dark btn-lg">チームアカウント作成</a>
                <a href="{{route('userRegister')}}" class="btn btn-secondary btn-lg">個人アカウント作成</a>
            </div>
       
</div>
@endsection