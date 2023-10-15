<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <link href="{{ asset('css/adminapp.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/eac1eb5eeb.js"></script>

    <title>Document</title>
</head>

<body>

    <section class="login">
        <div class="form-box">
            <form action="/admin/login-user" class="admin-form" method="POST">
                @csrf
                @method('POST')
                <h1>Fitness <span>Guru</span></h1>
                <h2>Admin Login</h2>
                @if ($errors->any())
                    <p id='RepMsg1'><i class="fa-solid fa-triangle-exclamation"> </i>
                        {{ $errors->first() }}
                    </p>
                @endif
                <div class="admin-form-inputs">
                    <div class="input-box">
                        <input name="username" placeholder="Username" type="text">
                    </div>
                    <div class="input-box">
                        <input name="password" placeholder="Password" type="password">
                    </div>
                    <div class="input-box">
                        <input type="submit" value="Login">
                    </div>
                    <a href="/">Switch to customer mode</a>
                </div>
            </form>
        </div>
    </section>

</body>

</html>
