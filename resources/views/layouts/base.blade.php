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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Доска объявлений</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Главная</a>
                  </li>
                  @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Вход</a>
                  </li>
                  @endguest
                  @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Мои объявления</a>
                  </li>
                  <form action="{{ route('logout') }}" method="POST" class="form-inline">
                              @csrf
                              <table>
                                  <tr>
                                      <td><input type="submit" class="btn btn-danger" value="Выход"></td>
                                  </tr>
                              </table>
                          </form>
                  @endauth
                </ul>
              </div>
            </div>
          </nav>
        <h1 class="my-3 text-center">Объявления</h1>
        @yield('main')
    </div>
</body>

</html>
