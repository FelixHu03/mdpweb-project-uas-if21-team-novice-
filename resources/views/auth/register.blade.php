<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register:Liox</title>
    <link rel="stylesheet" href="{{ url('/css/login.css') }}">

    <style>
        body {
            background: url("{{ asset('img/background_img.jpg') }}") no-repeat;
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 100vh; /* Adjust to fit the entire viewport */
            margin: 0; /* Ensure no default margin */
        }
    </style>

</head>

<body>
    <div class="container">
        <h2>Register</h2>
        @if ($errors->has('email'))
            <span class="invalid-feedback text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div class="input-field">
                <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required autofocus autocomplete="name">
                <i class="bx bxs-user"></i>
            </div>

            {{-- Email --}}
            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                <i class="bx bxs-envelope"></i>
            </div>

            {{-- Password --}}
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="new-password">
                <i class="bx bxs-lock"></i>
            </div>

            {{-- Confirm Password --}}
            <div class="input-field">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                <i class="bx bxs-lock"></i>
            </div>

            <button type="submit" name="submit" class="register">Register</button>
            <p>Already have an account? <a href="{{ route('login') }}" class="login-link">Login</a></p>
        </form>
    </div>
</body>

</html>
