<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Tiwi</title>
    <link rel="stylesheet" href="{{ asset('css/tiwi.css') }}">
</head>
<body>
    <main class="login-page">
        <form class="login-card" method="POST" action="{{ route('login.store') }}">
            @csrf
            <p class="eyebrow">Admin</p>
            <h1>Login to Tiwi</h1>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
            </div>
            <label><input type="checkbox" name="remember" value="1"> Remember me</label>
            <button class="button" type="submit">Login</button>
        </form>
    </main>
</body>
</html>
