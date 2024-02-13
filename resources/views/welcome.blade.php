<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Don Porfirio</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            background-image: url('/images/welcome.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .welcome-container {
            text-align: center;
            color: #ffffff;
        }
        .welcome-message {
            font-size: 6em;
            margin-bottom: 20px;
        }
        .login-button {
            font-size: 1em;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        img {
            max-width: 300px;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="antialiased">
    <div class="welcome-container">
        <img src="/images/logo.png" alt="Logo de Restaurant Don Porfirio">
        <div class="welcome-message">Bienvenido</div>
        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="login-button">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="login-button">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 login-button">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </div>
</body>
</html>
