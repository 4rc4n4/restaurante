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
        .form-container {
            background: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para el formulario */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px; /* Ajusta según el tamaño deseado */
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
            margin-bottom: 20px;
            text-decoration: none;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        .rounded-input {
        border: 1px solid #ccc;
        border-radius: 20px;
        padding: 10px 15px;
        font-size: 16px;
        width: calc(100% - 30px);
        box-sizing: border-box;
        outline: none;
    }

    .rounded-input:focus {
        border-color: #007BFF;
        box-shadow: 0 0 8px rgba(0,123,255,.5);
    }


    .input-label {
        display: block;
        margin-bottom: 8px;
        color: #444;
        font-size: 18px;
    }


    .input-error {
        color: #D32F2F;
        margin-top: 8px;
        font-size: 14px;
    }
    </style>
</head>
<body class="antialiased">
    <div class="form-container">
        <img src="/images/logo.png" alt="Logo de Restaurant Don Porfirio" class="logo">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="input-label" />
                <x-text-input id="email" class="rounded-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="input-error" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="input-label" />
                <x-text-input id="password" class="rounded-input"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="input-error" />
            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="login-button" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="login-button">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</body>
</html>
