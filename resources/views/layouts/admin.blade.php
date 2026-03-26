<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 


    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            height: 100vh;
            background: #212529;
            color: white;
            position: fixed;
            width: 250px;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #343a40;
            color: white;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            background: #f4f6f9;
            min-height: 100vh;
        }

        .stat-card {
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>

<div class="sidebar p-3">
    <h4 class="text-center mb-4">Admin Panel</h4>

    <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
    <a href="{{ route('products.index') }}">📦 Ürünler</a>
    <a href="{{ route('admin.orders') }}">🧾 Siparişler</a>
    <a href="{{ route('products.create') }}">➕ Yeni Ürün</a>
    <hr class="text-secondary">
    <a href="/">🌍 Siteye Dön</a>
    <form action="{{ route('logout') }}" method="POST" class="mt-3">
        @csrf
        <button class="btn btn-danger w-100">🚪Çıkış Yap</button>
    </form>
</div>

<div class="content">
    @yield('content')
</div>
</body>
</html>    