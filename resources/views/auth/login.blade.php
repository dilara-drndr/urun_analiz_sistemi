<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Segoe UI',sans-serif; background:#f1f5f9; display:flex; align-items:center; justify-content:center; min-height:100vh; }
        .card { background:white; border-radius:20px; padding:48px 40px; width:100%; max-width:420px; box-shadow:0 8px 32px rgba(0,0,0,0.1); }
        .logo { text-align:center; margin-bottom:32px; }
        .logo span { font-size:1.8rem; font-weight:800; background:linear-gradient(135deg,#0d6efd,#6610f2); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
        .logo p { color:#6b7280; font-size:14px; margin-top:4px; }
        label { display:block; font-weight:600; font-size:14px; margin-bottom:6px; color:#374151; }
        input[type=email], input[type=password] { width:100%; padding:11px 14px; border:1px solid #e5e7eb; border-radius:10px; font-size:15px; outline:none; transition:border 0.2s; }
        input:focus { border-color:#0d6efd; box-shadow:0 0 0 3px #0d6efd20; }
        .field { margin-bottom:20px; }
        .row { display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; }
        .row label { font-weight:400; color:#6b7280; font-size:14px; margin:0; display:flex; align-items:center; gap:6px; }
        .btn { width:100%; padding:13px; background:linear-gradient(135deg,#0d6efd,#6610f2); color:white; border:none; border-radius:10px; font-size:16px; font-weight:600; cursor:pointer; }
        .btn:hover { opacity:0.9; }
        .bottom { text-align:center; margin-top:20px; font-size:14px; color:#6b7280; }
        .bottom a { color:#0d6efd; text-decoration:none; font-weight:600; }
        .forgot { color:#0d6efd; text-decoration:none; font-size:13px; }
        .error { background:#fee2e2; color:#dc2626; padding:10px 14px; border-radius:8px; font-size:14px; margin-bottom:16px; }
    </style>
</head>
<body>
<div class="card">
    <div class="logo">
        <span>🛒 TeknoMarket</span>
        <p>Hesabınıza giriş yapın</p>
    </div>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
            <label>E-posta</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@email.com" required autofocus>
        </div>
        <div class="field">
            <label>Şifre</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>
        <div class="row">
            <label><input type="checkbox" name="remember"> Beni hatırla</label>
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot">Şifreni unuttun mu?</a>
            @endif
        </div>
        <button type="submit" class="btn">Giriş Yap</button>
    </form>

    <div class="bottom">
        Hesabın yok mu? <a href="{{ route('register') }}">Kayıt Ol</a>
    </div>
     <div style="text-align:center; margin-top:16px;">
        <a href="{{ url('/') }}" style="color:#6b7280; font-size:13px; text-decoration:none;">
            ← Ana Sayfaya Dön
        </a>
    </div>
</div>
</body>
</html>