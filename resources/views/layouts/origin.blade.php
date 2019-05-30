<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple SNS - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
</head>

<body>
    <h1>
        Simple SNS
    </h1>
    <nav>
        <div>
            <ul>
                <li><a href="/">Top</a></li>
                <li><a href="/auth/login">Login</a></li>
                <li><a href="/auth/register">Register</a></li>
                @if (Auth::check())
                <li><a href="/auth/logout">Logout</a></li>

                @endif
            </ul>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
</body>

</html>