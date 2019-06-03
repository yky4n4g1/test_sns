@extends('layouts.origin')
@section('title', 'Top')
@section('content')
<p>
    @auth
    {{ Auth::user()->name }}さん、こんにちは！
    @endauth
    @guest
    ようこそ Simple SNS へ
    @endguest
</p>
@endsection