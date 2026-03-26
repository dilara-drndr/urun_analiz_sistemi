<!DOCTYPE html>
<html>
<head>
    <title>Ürün Güncelle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding-bottom: 80px; }
        .sticky-btn {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            padding: 12px 20px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            z-index: 999;
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Ürün Güncelle</h3>

        <form id="editForm" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Ürün Adı</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="category" class="form-control" id="categorySelect"
                    onchange="window.location.href='{{ route('products.edit', $product->id) }}?cat=' + this.value">
                    <option value="">-- Kategori Seç --</option>
                    <option value="Telefon" {{ $product->category == 'Telefon' ? 'selected' : '' }}>Telefon</option>
                    <option value="Laptop" {{ $product->category == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                    <option value="Kulaklık" {{ $product->category == 'Kulaklık' ? 'selected' : '' }}>Kulaklık</option>
                    <option value="Tablet" {{ $product->category == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="Monitör" {{ $product->category == 'Monitör' ? 'selected' : '' }}>Monitör</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Fiyat</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Açıklama</label>
                <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
            </div>

            @if($product->images && $product->images->count() > 0)
            <div class="mb-3">
                <label class="form-label fw-bold">Mevcut Görseller</label>
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    @foreach($product->images as $image)
                    <div style="position:relative;">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                            style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                        <button type="button"
                            onclick="deleteImage({{ $image->id }})"
                            style="position:absolute; top:4px; right:4px; background:#dc3545; color:white; border:none; border-radius:50%; width:22px; height:22px; font-size:12px;">✕</button>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Yeni Görseller Ekle</label>
                <input type="file" name="images[]" class="form-control" multiple>
            </div>

            @php
                $specs = $product->specs ? json_decode($product->specs, true) : [];
                $category = $product->category;
            @endphp

            {{-- SADECE SEÇİLİ KATEGORİNİN BÖLÜMÜ GÖSTERİLİYOR --}}

            @if($category == 'Telefon')
            <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">📱 Telefon Özellikleri</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Ekran Boyutu</label>
                    <input type="text" name="specs[ekran]" class="form-control" placeholder="6.1 inç" value="{{ $specs['ekran'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>İşlemci</label>
                    <input type="text" name="specs[islemci]" class="form-control" placeholder="A16 Bionic" value="{{ $specs['islemci'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>RAM</label>
                    <input type="text" name="specs[ram]" class="form-control" placeholder="6 GB" value="{{ $specs['ram'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Depolama</label>
                    <input type="text" name="specs[depolama]" class="form-control" placeholder="128 GB" value="{{ $specs['depolama'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Kamera</label>
                    <input type="text" name="specs[kamera]" class="form-control" placeholder="48 MP" value="{{ $specs['kamera'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Batarya</label>
                    <input type="text" name="specs[batarya]" class="form-control" placeholder="3279 mAh" value="{{ $specs['batarya'] ?? '' }}">
                </div>
            </div>
            @endif

            @if($category == 'Laptop')
            <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">💻 Laptop Özellikleri</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Ekran Boyutu</label>
                    <input type="text" name="specs[ekran]" class="form-control" placeholder="15.6 inç" value="{{ $specs['ekran'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>İşlemci</label>
                    <input type="text" name="specs[islemci]" class="form-control" placeholder="Intel i7" value="{{ $specs['islemci'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>RAM</label>
                    <input type="text" name="specs[ram]" class="form-control" placeholder="16 GB" value="{{ $specs['ram'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Depolama</label>
                    <input type="text" name="specs[depolama]" class="form-control" placeholder="512 GB SSD" value="{{ $specs['depolama'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Grafik Kartı</label>
                    <input type="text" name="specs[grafik]" class="form-control" placeholder="NVIDIA RTX 3050" value="{{ $specs['grafik'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>İşletim Sistemi</label>
                    <input type="text" name="specs[os]" class="form-control" placeholder="Windows 11" value="{{ $specs['os'] ?? '' }}">
                </div>
            </div>
            @endif

            @if($category == 'Kulaklık')
            <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">🎧 Kulaklık Özellikleri</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Bağlantı Tipi</label>
                    <input type="text" name="specs[baglanti]" class="form-control" placeholder="Bluetooth 5.3" value="{{ $specs['baglanti'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Batarya Ömrü</label>
                    <input type="text" name="specs[batarya]" class="form-control" placeholder="30 saat" value="{{ $specs['batarya'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Sürücü Boyutu</label>
                    <input type="text" name="specs[surucu]" class="form-control" placeholder="40 mm" value="{{ $specs['surucu'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Gürültü Engelleme</label>
                    <input type="text" name="specs[gurultu]" class="form-control" placeholder="Aktif Gürültü Engelleme" value="{{ $specs['gurultu'] ?? '' }}">
                </div>
            </div>
            @endif

            @if($category == 'Tablet')
            <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">📲 Tablet Özellikleri</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Ekran Boyutu</label>
                    <input type="text" name="specs[ekran]" class="form-control" placeholder="11 inç" value="{{ $specs['ekran'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>İşlemci</label>
                    <input type="text" name="specs[islemci]" class="form-control" placeholder="Apple M2" value="{{ $specs['islemci'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Depolama</label>
                    <input type="text" name="specs[depolama]" class="form-control" placeholder="128 GB" value="{{ $specs['depolama'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Çözünürlük</label>
                    <input type="text" name="specs[cozunurluk]" class="form-control" placeholder="2360 x 1640" value="{{ $specs['cozunurluk'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Batarya</label>
                    <input type="text" name="specs[batarya]" class="form-control" placeholder="7606 mAh" value="{{ $specs['batarya'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bağlantı</label>
                    <input type="text" name="specs[baglanti]" class="form-control" placeholder="Wi-Fi / 5G" value="{{ $specs['baglanti'] ?? '' }}">
                </div>
            </div>
            @endif

            @if($category == 'Monitör')
            <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">🖥️ Monitör Özellikleri</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Ekran Boyutu</label>
                    <input type="text" name="specs[ekran]" class="form-control" placeholder="27 inç" value="{{ $specs['ekran'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Çözünürlük</label>
                    <input type="text" name="specs[cozunurluk]" class="form-control" placeholder="2560 x 1440" value="{{ $specs['cozunurluk'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Yenileme Hızı</label>
                    <input type="text" name="specs[yenileme]" class="form-control" placeholder="144 Hz" value="{{ $specs['yenileme'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Panel Tipi</label>
                    <input type="text" name="specs[panel]" class="form-control" placeholder="IPS" value="{{ $specs['panel'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tepki Süresi</label>
                    <input type="text" name="specs[tepki]" class="form-control" placeholder="1 ms" value="{{ $specs['tepki'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bağlantı Noktaları</label>
                    <input type="text" name="specs[baglanti]" class="form-control" placeholder="HDMI, DisplayPort" value="{{ $specs['baglanti'] ?? '' }}">
                </div>
            </div>
            @endif

            <div style="height:20px;"></div>
        </form>

        {{-- Resim silme formları ana formun DIŞINDA --}}
        @if($product->images && $product->images->count() > 0)
            @foreach($product->images as $image)
            <form id="delete-image-{{ $image->id }}"
                  method="POST"
                  action="{{ route('product.image.delete', $image->id) }}"
                  style="display:none;">
                @csrf
                @method('DELETE')
            </form>
            @endforeach
        @endif
    </div>
</div>

{{-- SABİT GÜNCELLE BUTONU --}}
<div class="sticky-btn">
    <div class="container">
        <button type="button" onclick="document.getElementById('editForm').submit();"
            class="btn btn-warning w-100 fw-bold" style="font-size:16px;">
            💾 Güncelle
        </button>
    </div>
</div>

<script>
function deleteImage(id) {
    if(confirm('Bu görseli silmek istediğine emin misin?')) {
        document.getElementById('delete-image-' + id).submit();
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>