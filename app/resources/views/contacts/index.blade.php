@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">氏名</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">電話番号</th>
                <th scope="col">お問い合わせ内容</th>
            </tr>
        </thead>
        @foreach($contacts as $contact)
        <tbody>
            <a href="{{ route('contacts.index',$contact->id )}}">
                <tr>
                    <th scope="row">{{$contact->user_id}}</th>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->tel}}</td>
                    <td>{{$contact->message}}</td>
                </tr>
            </a>
        </tbody>
        @endforeach
    </table>
    {{ $contacts->links() }}
</div>

@endsection