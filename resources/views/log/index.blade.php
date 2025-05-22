<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <div class="login-container">
        <h1 class="login-title">Login</h1>

        <form action="{{ url('login') }}" method="POST">
            @csrf
            <input type="number" name="id" placeholder="Documento" required class="login-input">
            <input type="password" name="password" placeholder="Contraseña" required class="login-input">
            <button type="submit" class="login-button">Iniciar sesión</button>
        </form>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</body>
</html>
