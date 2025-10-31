@extends('layouts.app')

@section('content')
    @vite(["resources/sass/app.scss", "resources/js/bootstrap.js"])
    <div class="container-fluid py-5 bg-dark">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-secondary rounded-3 bg-dark text-light">
                    <div class="card-header bg-gradient-dark text-white py-4 rounded-top-3 border-bottom border-secondary">
                        <div class="d-flex align-items-center">
                            <div class="bg-dark rounded-circle p-3 me-3 border border-secondary">
                                <i class="bi bi-person-circle text-primary fs-2"></i>
                            </div>
                            <div>
                                <h2 class="mb-0 fw-bold">Профиль пользователя</h2>
                                <p class="mb-0 opacity-75">Управление вашими данными</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-5 bg-dark">
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3 d-flex align-items-center bg-success text-dark border-0">
                                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                                <div class="flex-grow-1">{{ session('status') }}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile') }}" class="needs-validation" novalidate>
                            @csrf
                            @method('PATCH')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold text-light">Полное имя</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-person text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name', $user->name) }}"
                                           placeholder="Введите ваше имя" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="tel" class="form-label fw-semibold text-light">Номер телефона</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-phone text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light @error('tel') is-invalid @enderror"
                                           id="tel" name="tel" value="{{ old('tel', $user->phone) }}"
                                           placeholder="Номер телефона" required>
                                    @error('tel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-light">Email адрес</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-envelope text-primary"></i>
                                    </span>
                                    <input type="email" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email', $user->email) }}"
                                           placeholder="your@email.com" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg fw-semibold py-2 rounded-2">
                                    <i class="bi bi-check-circle me-2"></i>Сохранить изменения
                                </button>
                                <a href="/" class="btn btn-outline-primary m-3 border-primary text-primary">
                                    К покупкам
                                </a>
                            </div>
                            @if($user->role==='admin')
                            <div class="d-grid">
                                <a href="{{route('adminCarCreateForm')}}" class="btn btn-outline-primary m-3 border-primary text-primary">
                                Админ-панель
                                </a>
                            </div>
                            @endif
                        </form>

                        <div class="mt-5 pt-4 border-top border-secondary">
                            <h5 class="fw-semibold text-light mb-3">Безопасность аккаунта</h5>
                            <a href="{{ route('changePassword') }}" class="btn btn-outline-primary rounded-2 d-flex align-items-center justify-content-between p-3 border-primary text-primary">
                                <span>
                                    <i class="bi bi-shield-lock me-2"></i>Изменить пароль
                                </span>
                                <i class="bi bi-chevron-right"></i>
                            </a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-gradient-dark {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%) !important;
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
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
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
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endsection
