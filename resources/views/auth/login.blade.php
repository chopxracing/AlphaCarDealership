@extends('layouts.app')

@section('content')
    @vite(["resources/sass/app.scss", "resources/js/bootstrap.js"])
    <div class="container-fluid py-5 bg-dark">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-secondary rounded-3 bg-dark text-light">
                    <div class="card-header bg-gradient-dark text-white text-center py-4 rounded-top-3 border-bottom border-secondary">
                        <h2 class="mb-0 fw-bold"><i class="bi bi-box-arrow-in-right me-2"></i>Вход в систему</h2>
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

                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-light">Email адрес</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-envelope text-primary"></i>
                                    </span>
                                    <input type="email" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}"
                                           placeholder="your@email.com" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-light">Пароль</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary border-end-0 text-light">
                                        <i class="bi bi-lock text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control bg-dark border-secondary border-start-0 ps-2 text-light @error('password') is-invalid @enderror"
                                           id="password" name="password" placeholder="Введите пароль" required>
                                    <button class="btn btn-outline-secondary toggle-password border-secondary text-light" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg fw-semibold py-2 rounded-2">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Войти в систему
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="text-light mb-0">Еще нет аккаунта?</p>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm mt-2 rounded-2 border-primary text-primary">
                                    <i class="bi bi-person-plus me-1"></i>Создать аккаунт
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
