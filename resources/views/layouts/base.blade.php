<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>@yield('title')::Объявления</title>
    <link rel="stylesheet" href="/styles/main.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a href="{{ route('index') }}"
            class="navbar-brand mr-auto">Главная</a>
            <a href="{{ route('register') }}"
            class="nav-item nav-link">Регистрация</a>
            <a href="{{ route('login') }}"
            class="nav-item nav-link">Вход</a>
            <a href="{{ route('home') }}"
            class="nav-item nav-link">Мои объявления</a>
            <form action="{{ route('logout') }}" method="POST"
            class="form-inline">
            @csrf
            <input type="submit" class="btn btn-danger"
             value="Выход">
        </form>
        </nav>
        <h1 class="my-3 text-center">Объявления</h1>
        @yield('main')
    </div>
</body>

</html>
