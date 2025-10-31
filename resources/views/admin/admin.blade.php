@extends('main.layout')

@section('title')
    Панель администратора
@endsection

@section('main_content')
    @vite(["resources/sass/app.scss", "resources/js/bootstrap.js"])
    <div class="container-fluid py-5 bg-dark">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <!-- Карточка добавления автомобиля -->
                <div class="card shadow-lg border-secondary rounded-3 bg-dark text-light mb-5">
                    <div class="card-header bg-gradient-dark text-white py-4 rounded-top-3 border-bottom border-secondary">
                        <h2 class="mb-0 fw-bold text-center">
                            <i class="bi bi-plus-circle me-2"></i>Добавление автомобиля
                        </h2>
                    </div>
                    <div class="card-body p-5">
                        <form method="POST" action="{{route('adminCarCreate')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="carName" class="form-label fw-semibold text-light">Марка</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-car-front text-primary"></i>
                                            </span>
                                            <input type="text" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light"
                                                   id="carName" name="carName" value="{{ old('carName') }}"
                                                   placeholder="Марка" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="carModel" class="form-label fw-semibold text-light">Модель</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-car-front-fill text-primary"></i>
                                            </span>
                                            <input type="text" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light"
                                                   id="carModel" name="carModel" value="{{ old('carModel') }}"
                                                   placeholder="Модель" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="carYear" class="form-label fw-semibold text-light">Год</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-calendar text-primary"></i>
                                            </span>
                                            <input type="number" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light"
                                                   id="carYear" name="carYear" value="{{ old('carYear') }}"
                                                   placeholder="Год" min="1990" max="2025" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="carColor" class="form-label fw-semibold text-light">Цвет</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-palette text-primary"></i>
                                            </span>
                                            <input type="text" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light"
                                                   id="carColor" name="carColor" value="{{ old('carColor') }}"
                                                   placeholder="Цвет" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="carMileage" class="form-label fw-semibold text-light">Пробег</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-speedometer2 text-primary"></i>
                                            </span>
                                            <input type="number" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light"
                                                   id="carMileage" name="carMileage" value="{{ old('carMileage') }}"
                                                   placeholder="Пробег" min="0" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="carPrice" class="form-label fw-semibold text-light">Цена</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-currency-dollar text-primary"></i>
                                            </span>
                                            <input type="number" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light"
                                                   id="carPrice" name="carPrice" value="{{ old('carPrice') }}"
                                                   placeholder="Цена" min="0" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="carCount" class="form-label fw-semibold text-light">Количество</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-box text-primary"></i>
                                            </span>
                                            <input type="number" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light"
                                                   id="carCount" name="carCount" value="{{ old('carCount') }}"
                                                   placeholder="Количество" min="0" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="is_new" class="form-label fw-semibold text-light">Состояние</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-star text-primary"></i>
                                            </span>
                                            <select class="form-control bg-dark border-secondary border-start-0 ps-2 text-light" id="is_new" name="is_new" required>
                                                <option value="">Выберите состояние</option>
                                                <option value="1" {{ old('is_new') == '1' ? 'selected' : '' }}>Новая</option>
                                                <option value="0" {{ old('is_new') == '0' ? 'selected' : '' }}>Б/У</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="carEngineType" class="form-label fw-semibold text-light">Тип двигателя</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-gear text-primary"></i>
                                            </span>
                                            <select class="form-control bg-dark border-secondary border-start-0 ps-2 text-light" id="carEngineType" name="carEngineType" required>
                                                <option value="">Выберите тип двигателя</option>
                                                <option value="1" {{ old('carEngineType') == '1' ? 'selected' : '' }}>Бензиновый</option>
                                                <option value="2" {{ old('carEngineType') == '2' ? 'selected' : '' }}>Дизельный</option>
                                                <option value="3" {{ old('carEngineType') == '3' ? 'selected' : '' }}>Электрический</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="carTransmissionType" class="form-label fw-semibold text-light">Тип коробки</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                                <i class="bi bi-gear-wide text-primary"></i>
                                            </span>
                                            <select class="form-control bg-dark border-secondary border-start-0 ps-2 text-light" id="carTransmissionType" name="carTransmissionType" required>
                                                <option value="">Выберите тип коробки</option>
                                                <option value="1" {{ old('carTransmissionType') == '1' ? 'selected' : '' }}>МКПП</option>
                                                <option value="2" {{ old('carTransmissionType') == '2' ? 'selected' : '' }}>АКПП</option>
                                                <option value="3" {{ old('carTransmissionType') == '3' ? 'selected' : '' }}>Вариатор</option>
                                                <option value="4" {{ old('carTransmissionType') == '4' ? 'selected' : '' }}>Робот</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="carImage" class="form-label fw-semibold text-light">Изображение автомобиля</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-image text-primary"></i>
                                    </span>
                                    <input type="file" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light"
                                           id="carImage" name="carImage" value="{{ old('carImage') }}"
                                           accept="image/*" required>
                                </div>
                                <div class="form-text text-light">Загрузите изображение автомобиля</div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg fw-semibold py-3 rounded-2">
                                    <i class="bi bi-plus-circle me-2"></i>Создать автомобиль
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Карточка удаления автомобиля -->
                <div class="card shadow-lg border-secondary rounded-3 bg-dark text-light">
                    <div class="card-header bg-gradient-danger text-white py-4 rounded-top-3 border-bottom border-secondary">
                        <h2 class="mb-0 fw-bold text-center">
                            <i class="bi bi-trash me-2"></i>Удаление автомобиля
                        </h2>
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('adminCarDelete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="mb-4">
                                <label for="car_id" class="form-label fw-semibold text-light">Выберите автомобиль для удаления</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-car-front text-danger"></i>
                                    </span>
                                    <select name="car_id" id="car_id" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light" required>
                                        <option value="">Выберите автомобиль</option>
                                        @foreach($catalogs as $catalog)
                                            <option value="{{ $catalog->id }}">
                                                {{ $catalog->carName }} {{ $catalog->carModel }} ({{ $catalog->carYear }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger btn-lg fw-semibold py-3 rounded-2">
                                    <i class="bi bi-trash me-2"></i>Удалить автомобиль
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-gradient-dark {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%) !important;
        }
        .bg-gradient-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
        }
        .bg-dark {
            background-color: #1a202c !important;
        }
        .card {
            transition: transform 0.3s ease;
            background-color: #1a202c;
        }
        .card:hover {
            transform: translateY(-3px);
        }
        .form-control:focus {
            background-color: #2d3748;
            border-color: #0d6efd;
            color: white;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
        .form-control::placeholder {
            color: #a0aec0;
        }
        body {
            background-color: #1a202c;
        }
        .form-select:focus {
            background-color: #2d3748;
            border-color: #0d6efd;
            color: white;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endsection
