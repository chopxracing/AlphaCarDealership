@extends('layouts.app')

@section('content')
    @vite(["resources/sass/app.scss", "resources/js/bootstrap.js"])
    <div class="container-fluid py-5 bg-dark">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-secondary rounded-3 bg-dark text-light">
                    <div class="card-header bg-gradient-dark text-white py-4 rounded-top-3 border-bottom border-secondary">
                        <h2 class="mb-0 fw-bold text-center"><i class="bi bi-shield-lock me-2"></i>Смена пароля</h2>
                    </div>
                    <div class="card-body p-5">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show rounded-3 bg-danger text-light border-0">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3 d-flex align-items-center bg-success text-light border-0">
                                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                                <div class="flex-grow-1">{{ session('status') }}</div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('changePassword') }}" class="needs-validation" novalidate>
                            @csrf

                            <div class="mb-4">
                                <label for="current_password" class="form-label fw-semibold text-light">Текущий пароль</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-key text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light @error('current_password') is-invalid @enderror"
                                           id="current_password" name="current_password"
                                           placeholder="Введите текущий пароль" required>
                                    <button class="btn btn-outline-secondary toggle-password border-secondary text-light" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="new_password" class="form-label fw-semibold text-light">Новый пароль</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-lock text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light @error('new_password') is-invalid @enderror"
                                           id="new_password" name="new_password"
                                           placeholder="Минимум 8 символов" required>
                                    <button class="btn btn-outline-secondary toggle-password border-secondary text-light" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="new_password_confirmation" class="form-label fw-semibold text-light">Подтверждение пароля</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-lock-fill text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light"
                                           id="new_password_confirmation" name="new_password_confirmation"
                                           placeholder="Повторите новый пароль" required>
                                    <button class="btn btn-outline-secondary toggle-password border-secondary text-light" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="d-grid gap-3">
                                <button type="submit" class="btn btn-primary btn-lg fw-semibold py-2 rounded-2">
                                    <i class="bi bi-shield-check me-2"></i>Обновить пароль
                                </button>
                                <a href="{{ route('profile') }}" class="btn btn-outline-secondary rounded-2 border-secondary text-light">
                                    <i class="bi bi-arrow-left me-2"></i>Назад к профилю
                                </a>
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
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-password');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const passwordInput = this.parentElement.querySelector('input');
                    const icon = this.querySelector('i');

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    }
                });
            });
        });
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endsection
