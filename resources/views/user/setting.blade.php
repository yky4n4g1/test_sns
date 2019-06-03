@extends('layouts.origin')
@section('title', Auth::user()->name. "'s Setting")
@section('content')
<h1>ユーザ設定</h1>

<div>
    <p>現在の名前:{{ Auth::user()->name }}</p>
    <form action="/user/setting" method="POST">
        {{ csrf_field() }}
        ユーザ名の変更:<input type="text" name="new_name" id="new_name">
        <input type="submit" name="submit" value="Change">
    </form>
</div>

@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection