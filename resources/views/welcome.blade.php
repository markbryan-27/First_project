<!DOCTYPE html>
<html>
<head>
    <title>house.ph</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>
<div class="background">
    <div class="login-container">

        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label class="input-label" for="email">Email:</label>
            <input type="email" id="email" name="email" class="login-box" required>

            <label class="input-label" for="password">Password:</label>
            <input type="password" id="password" name="password" class="login-box" required>

            <div class="options">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="#">Forgot password</a>
            </div>

            <div class="button-container">
                <button type="submit" class="login-button">Log in</button>
            </div>
        </form>
    </div>
</div>

<footer>
    Contact us: madrinanamark4@gmail.com<br>
    Phone: 09918252600
</footer>
</body>
</html>
