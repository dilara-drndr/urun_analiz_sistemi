<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

<div style="background:linear-gradient(135deg,#0d6efd,#6610f2); padding:70px 0; text-align:center; color:white;">
    <h1 style="font-size:2.5rem; font-weight:800; margin:0;">İletişim</h1>
    <p style="margin-top:8px; opacity:0.8;">Sorularınız için buradayız</p>
</div>

<div style="max-width:1100px; margin:0 auto; padding:50px 20px;">
    <div style="display:grid; grid-template-columns:1fr 2fr; gap:40px; flex-wrap:wrap;">

        <div>
            <h5 style="font-weight:800; font-size:1.1rem; margin-bottom:24px;">Bize Ulaşın</h5>

            <div style="display:flex; align-items:center; gap:16px; margin-bottom:24px;">
                <div style="background:#0d6efd20; border-radius:12px; padding:12px;">
                    <i class="bi bi-envelope-fill" style="font-size:1.3rem; color:#0d6efd;"></i>
                </div>
                <div>
                    <div style="color:#6b7280; font-size:12px;">E-posta</div>
                    <div style="font-weight:600;">destek@teknoloji.com</div>
                </div>
            </div>

            <div style="display:flex; align-items:center; gap:16px; margin-bottom:24px;">
                <div style="background:#20c99720; border-radius:12px; padding:12px;">
                    <i class="bi bi-telephone-fill" style="font-size:1.3rem; color:#20c997;"></i>
                </div>
                <div>
                    <div style="color:#6b7280; font-size:12px;">Telefon</div>
                    <div style="font-weight:600;">0555 555 55 55</div>
                </div>
            </div>

            <div style="display:flex; align-items:center; gap:16px; margin-bottom:24px;">
                <div style="background:#fd7e1420; border-radius:12px; padding:12px;">
                    <i class="bi bi-geo-alt-fill" style="font-size:1.3rem; color:#fd7e14;"></i>
                </div>
                <div>
                    <div style="color:#6b7280; font-size:12px;">Adres</div>
                    <div style="font-weight:600;">İstanbul / Türkiye</div>
                </div>
            </div>

            <div style="display:flex; align-items:center; gap:16px; margin-bottom:24px;">
                <div style="background:#6610f220; border-radius:12px; padding:12px;">
                    <i class="bi bi-clock-fill" style="font-size:1.3rem; color:#6610f2;"></i>
                </div>
                <div>
                    <div style="color:#6b7280; font-size:12px;">Çalışma Saatleri</div>
                    <div style="font-weight:600;">Hafta içi 09:00 - 18:00</div>
                </div>
            </div>

            <div style="margin-top:16px;">
                <div style="font-weight:700; margin-bottom:12px;">Sosyal Medya</div>
                <div style="display:flex; gap:8px;">
                    <a href="#" style="border:1px solid #0d6efd; color:#0d6efd; border-radius:8px; padding:8px 12px; text-decoration:none;"><i class="bi bi-instagram"></i></a>
                    <a href="#" style="border:1px solid #0d6efd; color:#0d6efd; border-radius:8px; padding:8px 12px; text-decoration:none;"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" style="border:1px solid #0d6efd; color:#0d6efd; border-radius:8px; padding:8px 12px; text-decoration:none;"><i class="bi bi-facebook"></i></a>
                </div>
            </div>
        </div>

        <div style="background:white; border-radius:16px; padding:36px; box-shadow:0 2px 16px rgba(0,0,0,0.08);">
            <h5 style="font-weight:800; margin-bottom:24px;">Mesaj Gönder</h5>

            @if(session('success'))
                <div style="background:#d1fae5; color:#065f46; padding:12px 16px; border-radius:8px; margin-bottom:16px;">{{ session('success') }}</div>
            @endif

            <form method="POST" action="#">
                @csrf
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                    <div>
                        <label style="font-weight:600; font-size:14px; display:block; margin-bottom:6px;">Adınız</label>
                        <input type="text" name="name" placeholder="Adınız Soyadınız" required
                               style="width:100%; padding:10px 14px; border:1px solid #e5e7eb; border-radius:8px; outline:none; font-size:14px;">
                    </div>
                    <div>
                        <label style="font-weight:600; font-size:14px; display:block; margin-bottom:6px;">E-posta</label>
                        <input type="email" name="email" placeholder="ornek@email.com" required
                               style="width:100%; padding:10px 14px; border:1px solid #e5e7eb; border-radius:8px; outline:none; font-size:14px;">
                    </div>
                </div>
                <div style="margin-bottom:16px;">
                    <label style="font-weight:600; font-size:14px; display:block; margin-bottom:6px;">Konu</label>
                    <input type="text" name="subject" placeholder="Mesajınızın konusu"
                           style="width:100%; padding:10px 14px; border:1px solid #e5e7eb; border-radius:8px; outline:none; font-size:14px;">
                </div>
                <div style="margin-bottom:20px;">
                    <label style="font-weight:600; font-size:14px; display:block; margin-bottom:6px;">Mesajınız</label>
                    <textarea name="message" rows="5" placeholder="Mesajınızı buraya yazın..." required
                              style="width:100%; padding:10px 14px; border:1px solid #e5e7eb; border-radius:8px; outline:none; font-size:14px; resize:vertical;"></textarea>
                </div>
                <button type="submit"
                        style="background:#0d6efd; color:white; border:none; padding:12px 36px; border-radius:8px; font-weight:600; cursor:pointer; font-size:15px;">
                    <i class="bi bi-send-fill"></i> Mesaj Gönder
                </button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>