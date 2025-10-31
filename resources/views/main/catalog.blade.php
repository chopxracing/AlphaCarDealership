@extends('main.layout')

@section('title')
    Каталог автомобилей
@endsection

@section('main_content')
    <!-- Сообщения об успехе -->
    @if(session('success'))
        <div class="alert alert-dark alert-dismissible fade show border-0" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Сообщения об ошибках -->
    @if($errors->any())
        <div class="alert alert-dark alert-dismissible fade show border-0" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid py-4">
        <!-- Заголовок и фильтры -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="display-4 fw-bold text-center text-white mb-3">Каталог автомобилей</h1>
                <p class="lead text-center text-gray-400">Выберите автомобиль своей мечты из нашего широкого ассортимента</p>
            </div>
        </div>

        <!-- Форма фильтрации -->
        <div class="card mb-4 border-0 shadow bg-gray-800">
            <div class="card-header bg-gray-800 border-gray-700 py-3">
                <h5 class="mb-0 text-white">
                    <i class="bi bi-funnel me-2"></i>Фильтры автомобилей
                </h5>
            </div>
            <div class="card-body bg-gray-800">
                <form action="{{ route('catalog') }}" method="GET">
                    <div class="row g-4">
                        <!-- Состояние автомобиля -->
                        <div class="col-md-3">
                            <label class="form-label fw-semibold text-white">Состояние</label>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="is_new" id="all" value=""
                                    {{ !request('is_new') ? 'checked' : '' }}>
                                <label class="btn btn-outline-gray-600" for="all">Все</label>

                                <input type="radio" class="btn-check" name="is_new" id="new" value="1"
                                    {{ request('is_new') == '1' ? 'checked' : '' }}>
                                <label class="btn btn-outline-gray-600" for="new">Новые</label>

                                <input type="radio" class="btn-check" name="is_new" id="notNew" value="0"
                                    {{ request('is_new') == '0' ? 'checked' : '' }}>
                                <label class="btn btn-outline-gray-600" for="notNew">Б/У</label>
                            </div>
                        </div>

                        <!-- Марка -->
                        <div class="col-md-3">
                            <label for="carName" class="form-label fw-semibold text-white">Марка</label>
                            <select name="carName" id="carName" class="form-select border-gray-700 bg-gray-800 text-white py-2">
                                <option value="">Все марки</option>
                                @foreach($carNames as $carName)
                                    <option value="{{ $carName }}" {{ request('carName') == $carName ? 'selected' : '' }}>
                                        {{ $carName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Модель -->
                        <div class="col-md-3">
                            <label for="carModel" class="form-label fw-semibold text-white">Модель</label>
                            <select name="carModel" id="carModel" class="form-select border-gray-700 bg-gray-800 text-white py-2">
                                <option value="">Все модели</option>
                                @foreach($carModels as $carModel)
                                    <option value="{{ $carModel }}" {{ request('carModel') == $carModel ? 'selected' : '' }}>
                                        {{ $carModel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Цвет -->
                        <div class="col-md-3">
                            <label for="carColor" class="form-label fw-semibold text-white">
                                <i class="bi bi-palette me-1"></i>Цвет
                            </label>
                            <select name="carColor" id="carColor" class="form-select border-gray-700 bg-gray-800 text-white py-2">
                                <option value="">Все цвета</option>
                                <option value="Черный" {{ request('carColor') == 'Черный' ? 'selected' : '' }}>⚫ Черный</option>
                                <option value="Белый" {{ request('carColor') == 'Белый' ? 'selected' : '' }}>⚪ Белый</option>
                                <option value="Красный" {{ request('carColor') == 'Красный' ? 'selected' : '' }}>🔴 Красный</option>
                                <option value="Синий" {{ request('carColor') == 'Синий' ? 'selected' : '' }}>🔵 Синий</option>
                                <option value="Серый" {{ request('carColor') == 'Серый' ? 'selected' : '' }}>⚪ Серый</option>
                                <option value="Зеленый" {{ request('carColor') == 'Зеленый' ? 'selected' : '' }}>🟢 Зеленый</option>
                                <option value="Желтый" {{ request('carColor') == 'Желтый' ? 'selected' : '' }}>🟡 Желтый</option>
                                <option value="Оранжевый" {{ request('carColor') == 'Оранжевый' ? 'selected' : '' }}>🟠 Оранжевый</option>
                            </select>
                        </div>

                        <!-- Год выпуска -->
                        <div class="col-md-2">
                            <label for="carYear" class="form-label fw-semibold text-white">
                                <i class="bi bi-calendar3 me-1"></i>Год выпуска
                            </label>
                            <input type="number" name="carYear" id="carYear" class="form-control border-gray-700 bg-gray-800 text-white py-2"
                                   value="{{ request('carYear') }}" placeholder="Например: 2020"
                                   min="1970" max="{{ date('Y') }}">
                        </div>

                        <!-- Цена -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-white">
                                <i class="bi bi-currency-dollar me-1"></i>Цена, ₽
                            </label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="number" name="min_price" id="min_price" class="form-control border-gray-700 bg-gray-800 text-white py-2"
                                           value="{{ request('min_price') }}" placeholder="От" min="0">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="max_price" id="max_price" class="form-control border-gray-700 bg-gray-800 text-white py-2"
                                           value="{{ request('max_price') }}" placeholder="До" min="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Кнопки -->
                    <div class="row mt-4 pt-3 border-gray-700">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <div class="text-gray-400 small">
                                <i class="bi bi-info-circle me-1"></i>
                                Найдено автомобилей: <strong class="text-white">{{ $catalogs->count() }}</strong>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('catalog') }}" class="btn btn-outline-gray-600 px-4">
                                    <i class="bi bi-arrow-clockwise me-2"></i>Сбросить
                                </a>
                                <button type="submit" class="btn btn-gray-700 px-4">
                                    <i class="bi bi-funnel me-2"></i>Применить фильтры
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Сетка карточек -->
        <div class="row g-4">
            @foreach($catalogs as $catalog)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="card h-100 shadow border-gray-700 bg-gray-800 product-card">
                        <!-- Бейдж статуса -->
                        <div class="position-absolute top-0 start-0 m-2">
                            @if($catalog->carCount > 0)
                                <span class="badge bg-gray-700">В наличии</span>
                            @else
                                <span class="badge bg-gray-900">Нет в наличии</span>
                            @endif
                        </div>

                        <!-- Изображение -->
                        <div class="card-img-top bg-gray-700 overflow-hidden" style="height: 200px;">
                            @if($catalog->carImage)
                                <img src="{{ $catalog->carImage }}"
                                     alt="{{ $catalog->carName }}"
                                     class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-car-front-fill text-gray-500" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column bg-gray-800">
                            <!-- Название и модель -->
                            <h5 class="card-title fw-bold text-white">{{ $catalog->carName }}</h5>
                            <h6 class="card-subtitle mb-2 text-gray-400">{{ $catalog->carModel }}</h6>

                            <!-- Характеристики -->
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="bi bi-calendar3 text-gray-400 me-2"></i>
                                    <small class="text-gray-400">Год: {{ $catalog->carYear }}</small>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <i class="bi bi-palette text-gray-400 me-2"></i>
                                    <small class="text-gray-400">Цвет: {{ $catalog->carColor }}</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-box text-gray-400 me-2"></i>
                                    <small class="text-gray-400">В наличии: {{ $catalog->carCount }} шт.</small>
                                </div>
                            </div>

                            <!-- Цена и кнопка -->
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="h4 text-white fw-bold">{{ number_format($catalog->carPrice, 0, '', ' ') }} ₽</span>
                                    </div>
                                    @auth
                                        <button class="btn btn-gray-700 rounded-pill px-3 details-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#carDetailsModal"
                                                data-car-id="{{ $catalog->id }}"
                                                data-car-name="{{ $catalog->carName }}"
                                                data-car-model="{{ $catalog->carModel }}"
                                                data-car-year="{{ $catalog->carYear }}"
                                                data-car-color="{{ $catalog->carColor }}"
                                                data-car-price="{{ $catalog->carPrice }}"
                                                data-car-count="{{ $catalog->carCount }}"
                                                data-car-image="{{ $catalog->carImage }}"
                                                data-car-mileage="{{ $catalog->carMileage }}"
                                                data-transmission-type="{{ $catalog->transmissionType->type_name }}"
                                                data-engine-type="{{ $catalog->engineType->type_name }}"
                                                data-owners-count="{{ $catalog->carCount }}">
                                            <i class="bi bi-eye me-1"></i>Подробнее
                                        </button>
                                    @else
                                        <button class="btn btn-outline-gray-600 rounded-pill px-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginRequiredModal">
                                            <i class="bi bi-eye me-1"></i>Подробнее
                                        </button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <br>

        <!-- Пагинация -->
        @if(method_exists($catalogs, 'links'))
            <div class="col-12 d-flex justify-content-center">
                {{ $catalogs->links() }}
            </div>
        @endif

        <!-- Сообщение если каталог пуст -->
        @if($catalogs->count() === 0)
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <div class="alert alert-dark border-gray-700">
                        <i class="bi bi-info-circle me-2"></i>
                        В каталоге пока нет автомобилей
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Модальное окно с деталями автомобиля -->
    <div class="modal fade" id="carDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-gray-800 text-white border-gray-700">
                <div class="modal-header bg-gray-900 border-gray-700">
                    <h5 class="modal-title" id="carModalTitle">
                        <i class="bi bi-car-front me-2"></i>Детали автомобиля
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-gray-800">
                    <div class="row">
                        <!-- Изображение -->
                        <div class="col-md-6">
                            <div class="image-container rounded-3 overflow-hidden bg-gray-700" style="height: 300px;">
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-car-front-fill text-gray-500" style="font-size: 3rem;"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Информация -->
                        <div class="col-md-6">
                            <h3 id="carNameModel" class="fw-bold text-white mb-3"></h3>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-gray-400">Год выпуска:</span>
                                    <strong id="modalCarYear" class="text-white"></strong>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-gray-400">Цвет:</span>
                                    <strong id="modalCarColor" class="text-white"></strong>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-gray-400">В наличии:</span>
                                    <strong id="modalCarCount" class="text-gray-300"></strong>
                                </div>
                            </div>

                            <div class="border-top border-gray-700 pt-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-gray-400">Цена:</span>
                                    <span id="modalCarPrice" class="h3 fw-bold text-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Дополнительная информация -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5 class="fw-semibold mb-3 text-white">Характеристики</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-speedometer2 text-gray-400 me-2"></i>
                                        <span class="text-gray-400">Пробег: <strong id="modalCarMileage" class="text-white"></strong></span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-gear text-gray-400 me-2"></i>
                                        <span class="text-gray-400">Коробка: <strong id="modalTransmissionType" class="text-white"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-fuel-pump text-gray-400 me-2"></i>
                                        <span class="text-gray-400">Двигатель: <strong id="modalEngineType" class="text-white"></strong></span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-person text-gray-400 me-2"></i>
                                        <span class="text-gray-400">Владельцев: <strong id="modalOwnersCount" class="text-white"></strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-gray-800 border-gray-700">
                    <button type="button" class="btn btn-gray-700" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>Закрыть
                    </button>
                    <button class="btn btn-outline-gray-600 rounded-pill px-3"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCalls">
                        <i class="bi bi-telephone me-1"></i>Связаться с автосалоном
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно для неавторизованных -->
    @guest
        <div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-gray-800 text-white border-gray-700">
                    <div class="modal-header bg-gray-900 border-gray-700">
                        <h5 class="modal-title">
                            <i class="bi bi-lock me-2"></i>Требуется авторизация
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center py-4">
                        <i class="bi bi-shield-lock text-gray-400" style="font-size: 3rem;"></i>
                        <h4 class="my-3 text-white">Доступ ограничен</h4>
                        <p class="text-gray-400">Для просмотра подробной информации об автомобиле необходимо войти в систему.</p>
                    </div>
                    <div class="modal-footer justify-content-center border-gray-700">
                        <a href="{{ route('loginForm') }}" class="btn btn-gray-700 me-2">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Войти
                        </a>
                        <a href="{{ route('registerForm') }}" class="btn btn-outline-gray-600">
                            <i class="bi bi-person-plus me-1"></i>Зарегистрироваться
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    <!-- Модальное окно для звонков -->
    <div class="modal fade" id="modalCalls" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-gray-800 text-white border-gray-700">
                <div class="modal-header bg-gray-900 border-gray-700">
                    <h5 class="modal-title">
                        <i class="bi bi-telephone me-2"></i>Связаться с автосалоном
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <!-- Иконка -->
                    <div class="mb-4">
                        <i class="bi bi-telephone-fill text-gray-400" style="font-size: 3rem;"></i>
                    </div>

                    <!-- Заголовок -->
                    <h4 class="fw-bold text-white mb-3">Получить консультацию</h4>

                    <!-- Описание -->
                    <p class="text-gray-400 mb-4">
                        Наши менеджеры перезвонят вам на номер, указанный в вашем профиле
                    </p>

                    <!-- Контактная информация -->
                    <div class="contact-info">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-clock text-gray-400 me-3"></i>
                            <div class="text-start">
                                <small class="text-gray-400">Время работы</small>
                                <div class="fw-bold text-white">Ежедневно с 9:00 до 21:00</div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center">
                            <i class="bi bi-geo-alt text-gray-400 me-3"></i>
                            <div class="text-start">
                                <small class="text-gray-400">Адрес</small>
                                <div class="fw-bold text-white">г. Москва, ул. Автомобильная, 123</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center border-gray-700">
                    <form id="callOrderForm" action="{{ route('createCall') }}" method="POST">
                        @csrf
                        <input type="hidden" name="car_id" id="modalCarId">
                        <button type="submit" class="btn btn-gray-700">
                            Заказать звонок
                        </button>
                    </form>

                    <button type="button" class="btn btn-outline-gray-600" data-bs-dismiss="modal">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Стили для монохромной темной темы -->
    <style>
        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            color: #ffffff;
        }

        .bg-gray-800 { background-color: #1f2937 !important; }
        .bg-gray-700 { background-color: #374151 !important; }
        .bg-gray-600 { background-color: #4b5563 !important; }
        .bg-gray-900 { background-color: #111827 !important; }

        .border-gray-700 { border-color: #374151 !important; }

        .text-gray-400 { color: #9ca3af !important; }
        .text-gray-500 { color: #6b7280 !important; }
        .text-gray-300 { color: #d1d5db !important; }

        .btn-gray-700 {
            background-color: #374151 !important;
            border-color: #374151 !important;
            color: #ffffff !important;
        }

        .btn-gray-700:hover {
            background-color: #4b5563 !important;
            border-color: #4b5563 !important;
        }

        .btn-outline-gray-600 {
            border-color: #4b5563 !important;
            color: #9ca3af !important;
        }

        .btn-outline-gray-600:hover {
            background-color: #4b5563 !important;
            border-color: #4b5563 !important;
            color: #ffffff !important;
        }

        .card {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
            border-color: #4b5563;
        }

        .card-img-top {
            transition: transform 0.3s ease;
        }

        .product-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .form-select, .form-control {
            border-radius: 10px;
            transition: all 0.3s ease;
            border-width: 2px;
        }

        .form-select:focus, .form-control:focus {
            border-color: #6b7280;
            box-shadow: 0 0 0 0.2rem rgba(107, 114, 128, 0.25);
            transform: translateY(-2px);
            background-color: #1f2937;
            color: #ffffff;
        }

        .btn-group .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-check:checked + .btn {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            background-color: #4b5563 !important;
            border-color: #4b5563 !important;
            color: #ffffff !important;
        }

        .modal-content {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }

        .pagination .page-link {
            background-color: #1f2937;
            border-color: #374151;
            color: #ffffff;
        }

        .pagination .page-link:hover {
            background-color: #374151;
            border-color: #4b5563;
        }

        .pagination .page-item.active .page-link {
            background-color: #374151;
            border-color: #374151;
        }

        .badge.bg-gray-700 {
            background-color: #374151 !important;
        }

        .badge.bg-gray-900 {
            background-color: #111827 !important;
        }
    </style>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- JavaScript для работы модального окна -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const detailButtons = document.querySelectorAll('.details-btn');
            const imageContainer = document.querySelector('.image-container');
            const callOrderForm = document.getElementById('callOrderForm');
            const modalCarIdInput = document.getElementById('modalCarId');

            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Получаем car_id для формы звонка
                    const carId = this.getAttribute('data-car-id');
                    if (modalCarIdInput) {
                        modalCarIdInput.value = carId;
                    }

                    // Получаем данные из data-атрибутов
                    const carData = {
                        name: this.getAttribute('data-car-name'),
                        model: this.getAttribute('data-car-model'),
                        year: this.getAttribute('data-car-year'),
                        color: this.getAttribute('data-car-color'),
                        price: this.getAttribute('data-car-price'),
                        count: this.getAttribute('data-car-count'),
                        image: this.getAttribute('data-car-image'),
                        mileage: this.getAttribute('data-car-mileage'),
                        transmission: this.getAttribute('data-transmission-type'),
                        engine: this.getAttribute('data-engine-type'),
                        owners: this.getAttribute('data-owners-count')
                    };

                    // Заполняем текстовую информацию в модальном окне
                    document.getElementById('carModalTitle').textContent = `Детали: ${carData.name} ${carData.model}`;
                    document.getElementById('carNameModel').textContent = `${carData.name} ${carData.model}`;
                    document.getElementById('modalCarYear').textContent = carData.year;
                    document.getElementById('modalCarColor').textContent = carData.color;
                    document.getElementById('modalCarPrice').textContent = `${Number(carData.price).toLocaleString('ru-RU')} ₽`;
                    document.getElementById('modalCarCount').textContent = `${carData.count} шт.`;
                    document.getElementById('modalCarMileage').textContent = carData.mileage;
                    document.getElementById('modalTransmissionType').textContent = carData.transmission;
                    document.getElementById('modalEngineType').textContent = carData.engine;
                    document.getElementById('modalOwnersCount').textContent = carData.owners;

                    // Обрабатываем изображение
                    updateCarImage(carData.image, carData.name, carData.model);
                });
            });

            function updateCarImage(imageUrl, carName, carModel) {
                if (imageUrl && imageUrl !== '' && imageUrl !== 'null') {
                    const newImage = new Image();
                    newImage.src = imageUrl;
                    newImage.alt = `${carName} ${carModel}`;
                    newImage.className = 'w-100 h-100 object-fit-cover';

                    newImage.onload = function() {
                        imageContainer.innerHTML = '';
                        imageContainer.appendChild(newImage);
                    };

                    newImage.onerror = function() {
                        showPlaceholder(carName, carModel);
                    };
                } else {
                    showPlaceholder(carName, carModel);
                }
            }

            function showPlaceholder(carName, carModel) {
                imageContainer.innerHTML = `
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center flex-column">
                        <i class="bi bi-car-front-fill text-gray-500 mb-2" style="font-size: 3rem;"></i>
                        <small class="text-gray-500">${carName} ${carModel}</small>
                    </div>
                `;
            }
        });
    </script>
@endsection
