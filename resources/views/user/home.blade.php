{{-- ユーザコメント表示ページ --}}

@extends('layouts.origin')
@section('title', App\User::find($user_id)->name."のページ")
@section('content')

<h1>{{ App\User::find($user_id)->name }}のコメントページ</h1>

{{-- コメントがあるか --}}
@if (isset($comments[0]))

{{-- コメントの挿入 --}}
@foreach ($comments as $comment)
<div>
    <hr>
    <div>
        <p>
            {!! nl2br(e($comment->comment)) !!}
        </p>
    </div>
    <div>
        <input type="button" value="like">
    </div>
    @if (Auth::check() and Auth::user()->id == $user_id)
    <div class="comment-delete-form">
        {{-- 削除フォーム --}}
        <form action="/comment/delete" method="POST" onsubmit="return confirmation()">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $comment->id }}">
            <input type="submit" class="deleteButton" value="Delete">
        </form>
    </div>
    @endif
    <div class="comment-date">
        <p>{{ $comment->created_at }}</p>
    </div>
</div>

@endforeach
<hr>

@else
<p>コメントを投稿するとここに表示されます。</p>

@endif

{{-- error出力 --}}
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

@if (Auth::check() and Auth::user()->id == $user_id)
<form action="/comment/save" method="POST">
    {{ csrf_field() }}
    <textarea name="comment" cols="33" rows="6" placeholder="コメントを発信しましょう。"></textarea>
    <br>
    <input type="submit" value="送信">
</form>
@endif
@endsection

@section('script')
<script>
    // 削除確認用
    const confirmation = () => {
        return window.confirm("削除しますか？");
    }
</script>
@endsection