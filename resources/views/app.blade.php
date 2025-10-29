<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('CRUD Produtos'))</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #1a1d23;
            color: #e4e6eb;
        }
        .navbar {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        .card {
            background-color: #242831;
            border: 1px solid #3a3f4b;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .card-header {
            background-color: #2d323e;
            border-bottom: 1px solid #3a3f4b;
        }
        .table {
            color: #e4e6eb;
        }
        .table-hover tbody tr:hover {
            background-color: #2d323e;
        }
        .form-control, .form-select {
            background-color: #2d323e;
            border-color: #3a3f4b;
            color: #e4e6eb;
        }
        .form-control:focus, .form-select:focus {
            background-color: #353a47;
            border-color: #4a90e2;
            color: #e4e6eb;
            box-shadow: 0 0 0 0.25rem rgba(74, 144, 226, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
        }
        .alert {
            border: none;
        }
        .alert-success {
            background-color: #1e5128;
            color: #86efac;
        }
        .alert-danger {
            background-color: #5c1a1a;
            color: #fca5a5;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('products.index') }}">{{ __('Products') }}</a>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
