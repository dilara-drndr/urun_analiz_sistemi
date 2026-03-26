<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

<div style="background:linear-gradient(135deg,#0d6efd,#6610f2); padding:70px 0; text-align:center; color:white;">
    <h1 style="font-size:2.5rem; font-weight:800; margin:0;">Kategoriler</h1>
    <p style="margin-top:8px; opacity:0.8;">İhtiyacına göre kategori seç, ürünleri keşfet</p>
</div>

<div style="max-width:1100px; margin:0 auto; padding:50px 20px;">
    @php
    $ikonlar = ['Telefon'=>'bi-phone-fill','Laptop'=>'bi-laptop-fill','Dizüstü bilgisayar'=>'bi-laptop-fill','Kulaklık'=>'bi-headphones','Tablet'=>'bi-tablet-fill','Monitör'=>'bi-display-fill'];
    $renkler = ['#0d6efd','#6610f2','#20c997','#fd7e14','#dc3545','#0dcaf0'];
    @endphp

    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(200px,1fr)); gap:20px;">
        @foreach($categories as $i => $cat)
        @php $renk = $renkler[$i % count($renkler)]; @endphp
        <a href="{{ route('products.index', ['category' => $cat->category]) }}" style="text-decoration:none;">
            <div style="background:white; border-radius:16px; padding:32px 20px; text-align:center; box-shadow:0 2px 12px rgba(0,0,0,0.08); transition:transform 0.2s;"
                 onmouseover="this.style.transform='translateY(-5px)'"
                 onmouseout="this.style.transform='translateY(0)'">
                <div style="width:64px; height:64px; border-radius:16px; background:{{ $renk }}20; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
                    <i class="bi {{ $ikonlar[$cat->category] ?? 'bi-grid-fill' }}" style="font-size:1.8rem; color:{{ $renk }};"></i>
                </div>
                <div style="font-weight:700; color:#111827; font-size:16px; margin-bottom:4px;">{{ $cat->category }}</div>
                <div style="color:#6b7280; font-size:13px;">{{ $cat->total }} ürün</div>
            </div>
        </a>
        @endforeach
    </div>
</div>
</x-app-layout>