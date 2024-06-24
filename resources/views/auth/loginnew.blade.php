<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login:Liox</title>
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
        .text-white {
            color: white;
        }
    </style>

</head>

<body>
    <div class="container">
       
        <h2>Login</h2>
        <h3 class="text-white">Welcome to Hotel LIOX</h3>
        @if ($errors->has('email'))
            <span class="invalid-feedback text-denger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <form  method="POST" action="{{ route('login') }}">
            
            @csrf
             {{-- email --}}
            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="Username or Email">
                <i class="bx bxs-user"></i>

            </div>
            {{-- password --}}
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Password">
                <i class="bx bxs-user"></i>
            </div>
            <!-- href ini untuk bila lupa password -->
            <a href="#" class="forgot">
                <p>Forgot password</p>
            </a>
            <button type="submit" name="submit" class="login">Login</button>
            <!-- a href di bawah untuk masuk ke halaman sing-up -->
            <p class="text-white">Don't have an account? <a href="{{ route('register') }}" class="sing-up">=> Register</a></p>
        </form>
    </div>
</body>

</html>
