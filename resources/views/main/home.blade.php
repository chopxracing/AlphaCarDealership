@extends('main.layout')

@section('title')
    Главная
@endsection

@section('main_content')
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://static.lada.ru/images/v6/promo/vesta-bank-dt_new.webp" class="d-block w-100 h-1440"
                     alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Lada</h5>
                    <p>Отечественный автопром</p>
                    <a href="catalog" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.hdcarwallpapers.com/download/bmw_330i_m_sport_2022_5k_2-2560x1440.jpg"
                     class="d-block w-100 h-1440" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>BMW</h5>
                    <p>Немецкий автопром</p>
                    <a href="catalog" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.cenyavto.com/2022/09/Wsew-scaled.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Geely</h5>
                    <p>Модные китайцы по низким ценам</p>
                    <a href="catalog" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

@endsection
