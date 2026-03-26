<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f8f9fa;">
<div class="container py-5">
    <div class="card shadow border-0">
        <div class="row g-0">
 
            {{-- GÖRSEL KISMI --}}
            <div class="col-md-6">
                @if($product->images && $product->images->count() > 0)
 
                    @if($product->images->count() === 1)
                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                            style="height:450px; width:100%; object-fit:cover; border-radius:8px 0 0 8px;">
                    @else
                        <div id="productCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach($product->images as $key => $image)
                                    <button type="button"
                                        data-bs-target="#productCarousel"
                                        data-bs-slide-to="{{ $key }}"
                                        class="{{ $key == 0 ? 'active' : '' }}">
                                    </button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($product->images as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                            class="d-block w-100"
                                            style="height:450px; object-fit:cover; border-radius:8px 0 0 8px;">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    @endif
 
                @elseif($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                        style="height:450px; width:100%; object-fit:cover; border-radius:8px 0 0 8px;">
                @else
                    <div class="d-flex align-items-center justify-content-center h-100 text-muted" style="min-height:450px;">
                        <p>Bu ürün için görsel yok.</p>
                    </div>
                @endif
            </div>
 
            {{-- ÜRÜN BİLGİLERİ --}}
            <div class="col-md-6">
                <div class="card-body p-4">
                    <span class="badge bg-secondary mb-2">{{ $product->category }}</span>
                    <h2 class="fw-bold text-primary mb-2">{{ $product->name }}</h2>
 
                    @if($product->description)
                        <p class="text-muted mb-3">{{ $product->description }}</p>
                    @endif
 
                    <hr>
 
                    {{-- FİYAT --}}
                    <p class="mb-2">
                        <span class="text-success fs-2 fw-bold">
                            {{ number_format($product->price, 2) }} ₺
                        </span>
                    </p>
 
                    {{-- STOK --}}
                    <p class="mb-3">
                        @if($product->stock > 0)
                            <span class="text-success fw-semibold">● Stokta var</span>
                            <span class="text-muted ms-2">({{ $product->stock }} adet)</span>
                        @else
                            <span class="text-danger fw-semibold">● Tükendi</span>
                        @endif
                    </p>
 
                    {{-- SPECS --}}
                    @if($product->specs)
                        @php $specs = json_decode($product->specs, true); @endphp
                        @if(!empty($specs))
                        <div class="mb-3">
                            <h6 class="fw-bold text-dark mb-2">Teknik Özellikler</h6>
                            <table class="table table-sm table-bordered">
                                @php
                                $labels = [
                                    'ekran'      => 'Ekran Boyutu',
                                    'islemci'    => 'İşlemci',
                                    'ram'        => 'RAM',
                                    'depolama'   => 'Depolama',
                                    'kamera'     => 'Kamera',
                                    'batarya'    => 'Batarya',
                                    'grafik'     => 'Grafik Kartı',
                                    'os'         => 'İşletim Sistemi',
                                    'baglanti'   => 'Bağlantı',
                                    'surucu'     => 'Sürücü Boyutu',
                                    'gurultu'    => 'Gürültü Engelleme',
                                    'cozunurluk' => 'Çözünürlük',
                                    'yenileme'   => 'Yenileme Hızı',
                                    'panel'      => 'Panel Tipi',
                                    'tepki'      => 'Tepki Süresi',
                                ];
                                @endphp
                                @foreach($specs as $key => $value)
                                    @if($value)
                                    <tr>
                                        <td class="text-muted fw-semibold" style="width:40%">
                                            {{ $labels[$key] ?? $key }}
                                        </td>
                                        <td class="fw-bold">{{ $value }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        @endif
                    @endif
 
                    <p class="text-muted small mb-3">
                        👁 {{ $product->views }} kez görüntülendi
                    </p>
 
                    {{-- BUTONLAR --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            ← Geri Dön
                        </a>
                        @auth
                            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary" {{ $product->stock == 0 ? 'disabled' : '' }}>
                                    🛒 Sepete Ekle
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                🛒 Sepete Ekle
                            </a>
                        @endauth
                    </div>
 
                </div>
            </div>
 
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>