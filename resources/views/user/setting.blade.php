@extends('layouts.origin')
@section('title', Auth::user()->name. "'s Setting")
@section('content')
<h1>ユーザ設定</h1>

<div>
    <form action="/user/setting" method="POST">
        {{ csrf_field() }}
        <input type="text" name="new_name" id="new_name">
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