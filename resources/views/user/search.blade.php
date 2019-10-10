@extends('layouts.origin')
@section('title', $word.'の検索結果')
@section('content')
<h1>検索結果 - {{ $word }}</h1>

@foreach ($users as $user)
<hr>
<p>User:
    <a href={{"/user/".$user->id}}>{{$user->name}}</a>
</p>
<hr>
@endforeach
@endsection