<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

<div style="background:linear-gradient(135deg,#0d6efd,#6610f2); padding:50px 0; text-align:center; color:white;">
    <div style="width:80px; height:80px; border-radius:50%; background:rgba(255,255,255,0.2); display:flex; align-items:center; justify-content:center; margin:0 auto 12px;">
        <i class="bi bi-person-fill" style="font-size:2.5rem;"></i>
    </div>
    <h1 style="font-size:1.6rem; font-weight:800; margin:0;">{{ Auth::user()->name }}</h1>
    <p style="opacity:0.8; margin-top:4px; font-size:14px;">{{ Auth::user()->email }}</p>
</div>

<div style="max-width:700px; margin:0 auto; padding:40px 20px;">

    <!-- Bilgileri Güncelle -->
    <div style="background:white; border-radius:16px; padding:32px; box-shadow:0 2px 16px rgba(0,0,0,0.08); margin-bottom:24px;">
        <h5 style="font-weight:800; font-size:1.1rem; margin-bottom:6px;">
            <i class="bi bi-person-circle" style="color:#0d6efd;"></i> Kişisel Bilgiler
        </h5>
        <p style="color:#6b7280; font-size:14px; margin-bottom:24px;">Adınızı ve e-posta adresinizi güncelleyin.</p>

        @include('profile.partials.update-profile-information-form')
    </div>

    <!-- Şifre Değiştir -->
    <div style="background:white; border-radius:16px; padding:32px; box-shadow:0 2px 16px rgba(0,0,0,0.08); margin-bottom:24px;">
        <h5 style="font-weight:800; font-size:1.1rem; margin-bottom:6px;">
            <i class="bi bi-lock-fill" style="color:#6610f2;"></i> Şifre Değiştir
        </h5>
        <p style="color:#6b7280; font-size:14px; margin-bottom:24px;">Güvenliğiniz için güçlü bir şifre kullanın.</p>

        @include('profile.partials.update-password-form')
    </div>

    <!-- Hesabı Sil -->
    <div style="background:white; border-radius:16px; padding:32px; box-shadow:0 2px 16px rgba(0,0,0,0.08); border-left:4px solid #dc3545;">
        <h5 style="font-weight:800; font-size:1.1rem; margin-bottom:6px; color:#dc3545;">
            <i class="bi bi-trash-fill"></i> Hesabı Sil
        </h5>
        <p style="color:#6b7280; font-size:14px; margin-bottom:24px;">Hesabınızı sildiğinizde tüm verileriniz kalıcı olarak silinir.</p>

        @include('profile.partials.delete-user-form')
    </div>

</div>
</x-app-layout>
