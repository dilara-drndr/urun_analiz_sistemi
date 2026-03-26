<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Segoe UI',sans-serif; background:#f1f5f9; display:flex; align-items:center; justify-content:center; min-height:100vh; }
        .card { background:white; border-radius:20px; padding:48px 40px; width:100%; max-width:440px; box-shadow:0 8px 32px rgba(0,0,0,0.1); }
        .logo { text-align:center; margin-bottom:32px; }
        .logo span { font-size:1.8rem; font-weight:800; background:linear-gradient(135deg,#0d6efd,#6610f2); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
        .logo p { color:#6b7280; font-size:14px; margin-top:4px; }
        label { display:block; font-weight:600; font-size:14px; margin-bottom:6px; color:#374151; }
        input[type=text], input[type=email], input[type=password] { width:100%; padding:11px 14px; border:1px solid #e5e7eb; border-radius:10px; font-size:15px; outline:none; transition:border 0.2s; }
        input:focus { border-color:#0d6efd; box-shadow:0 0 0 3px #0d6efd20; }
        .field { margin-bottom:18px; }
        .btn { width:100%; padding:13px; background:linear-gradient(135deg,#0d6efd,#6610f2); color:white; border:none; border-radius:10px; font-size:16px; font-weight:600; cursor:pointer; margin-top:6px; }
        .btn:hover { opacity:0.9; }
        .bottom { text-align:center; margin-top:20px; font-size:14px; color:#6b7280; }
        .bottom a { color:#0d6efd; text-decoration:none; font-weight:600; }
        .error { background:#fee2e2; color:#dc2626; padding:10px 14px; border-radius:8px; font-size:14px; margin-bottom:16px; }
    </style>
</head>
<body>
<div class="card">
    <div class="logo">
        <span>🛒 TeknoMarket</span>
        <p>Yeni hesap oluşturun</p>
    </div>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="field">
            <label>İsim</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Adınız Soyadınız" required autofocus>
        </div>
        <div class="field">
            <label>E-posta</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="ornek@email.com" required>
        </div>
        <div class="field">
            <label>Şifre</label>
            <input type="password" name="password" placeholder="En az 8 karakter" required>
        </div>
        <div class="field">
            <label>Şifreyi Onayla</label>
            <input type="password" name="password_confirmation" placeholder="Şifrenizi tekrar girin" required>
        </div>
        <button type="submit" class="btn">Kayıt Ol</button>
    </form>

    <div class="bottom">
        Zaten hesabın var mı? <a href="{{ route('login') }}">Giriş Yap</a>
    </div>
     <div style="text-align:center; margin-top:16px;">
        <a href="{{ url('/') }}" style="color:#6b7280; font-size:13px; text-decoration:none;">
            ← Ana Sayfaya Dön
        </a>
    </div>
</div>
</body>
</html>