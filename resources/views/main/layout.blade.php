<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(["resources/sass/app.scss", "resources/js/bootstrap.js"])
    <title>@yield('title')</title>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" aria-hidden="true">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4 text-secondary">Автосалон "Альфа"</span>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="/" class="nav-link px-2 text-white">Главная</a>
                    </li>
                    <li><a href="catalog" class="nav-link px-2 text-white">Автомобили</a>
                    <li><a href="contacts" class="nav-link px-2 text-white">Контакты</a>
                    </li>
                    <li><a href="about" class="nav-link px-2 text-white">О компании</a>
                    </li>
                </ul>

                <div class="text-end">
                    <a href="{{asset('login')}}" class="btn btn-outline-light me-2">Войти в ЛК</a>
                </div>
            </div>
        </div>
    </header>
<body class="bg-dark">

<div>
    @yield('main_content')
</div>
</body>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top text-white">
    <p class="col-md-4 mb-0 text-white">© 2025 Company, Inc</p>
    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none text-white" aria-label="Bootstrap">
        <h2 class="text-secondary">Альфа</h2>
    </a>
    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-white">Главная</a></li>
        <li class="nav-item"><a href="/catalog" class="nav-link px-2 text-white">Автомобили</a></li>
        <li class="nav-item"><a href="/contacts" class="nav-link px-2 text-white">Контакты</a></li>
        <li class="nav-item"><a href="/about.blade.php" class="nav-link px-2 text-white">О компании</a></li>
    </ul>
</footer>
</html>
