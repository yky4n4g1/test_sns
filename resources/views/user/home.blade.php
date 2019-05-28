<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple SNS - UserPage</title>
</head>

<body>
    <h1>{{ App\User::find($user_id)->name }}のコメントページ</h1>

    @if (isset($comments[0]))


    @foreach ($comments as $comment)
    <hr>
    {{ $comment->comment }}<br>
    <div style="text-align:right;">
        <p>{{ $comment->created_at }}</p>
    </div>

    @endforeach
    <hr>

    @else
    <p>コメントを投稿するとここに表示されます。</p>

    @endif

    @if (Auth::check() and Auth::user()->id == $user_id)

    <form action="/comment/save" method="POST">
        {{ csrf_field() }}
        <textarea name="comment" cols="33" rows="6" placeholder="コメントを発信しましょう。"></textarea>
        <br>
        <input type="submit" value="送信">
    </form>
    @endif
</body>

</html>