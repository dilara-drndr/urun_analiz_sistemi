<!DOCTYPE html>
<html>
<head>
    <title>Ürün Ekle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Yeni Ürün Ekle</h3>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Ürün Adı</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="category" class="form-control" id="categorySelect" onchange="showSpecs()">
                    <option value="">-- Kategori Seç --</option>
                    <option value="Telefon">Telefon</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Kulaklık">Kulaklık</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Monitör">Monitör</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Açıklama</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Ürün Görselleri (birden fazla seçebilirsiniz)</label>
                <input type="file" name="images[]" class="form-control" multiple>
            </div>

            <div class="mb-3">
                <label>Fiyat</label>
                <input type="number" name="price" class="form-control">
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stock" class="form-control">
            </div>
            <div id="specs-Telefon" class="specs-section" style="display:none;">
                <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">📱 Telefon Özellikleri</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Ekran Boyutu</label>
                        <input type="text" name="specs[ekran]" class="form-control" placeholder="6.1 inç">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>İşlemci</label>
                        <input type="text" name="specs[islemci]" class="form-control" placeholder="A16 Bionic">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>RAM</label>
                        <input type="text" name="specs[ram]" class="form-control" placeholder="6 GB">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Depolama</label>
                        <input type="text" name="specs[depolama]" class="form-control" placeholder="128 GB">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Kamera</label>
                        <input type="text" name="specs[kamera]" class="form-control" placeholder="48 MP">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Batarya</label>
                        <input type="text" name="specs[batarya]" class="form-control" placeholder="3279 mAh">
                    </div>
                </div>
            </div>
 
            {{-- Laptop Özellikleri --}}
            <div id="specs-Laptop" class="specs-section" style="display:none;">
                <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">💻 Laptop Özellikleri</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Ekran Boyutu</label>
                        <input type="text" name="specs[ekran]" class="form-control" placeholder="15.6 inç">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>İşlemci</label>
                        <input type="text" name="specs[islemci]" class="form-control" placeholder="Intel i7">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>RAM</label>
                        <input type="text" name="specs[ram]" class="form-control" placeholder="16 GB">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Depolama</label>
                        <input type="text" name="specs[depolama]" class="form-control" placeholder="512 GB SSD">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Grafik Kartı</label>
                        <input type="text" name="specs[grafik]" class="form-control" placeholder="NVIDIA RTX 3050">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>İşletim Sistemi</label>
                        <input type="text" name="specs[os]" class="form-control" placeholder="Windows 11">
                    </div>
                </div>
            </div>
 
            {{-- Kulaklık Özellikleri --}}
            <div id="specs-Kulaklık" class="specs-section" style="display:none;">
                <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">🎧 Kulaklık Özellikleri</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Bağlantı Tipi</label>
                        <input type="text" name="specs[baglanti]" class="form-control" placeholder="Bluetooth 5.3">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Batarya Ömrü</label>
                        <input type="text" name="specs[batarya]" class="form-control" placeholder="30 saat">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Sürücü Boyutu</label>
                        <input type="text" name="specs[surucu]" class="form-control" placeholder="40 mm">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Gürültü Engelleme</label>
                        <input type="text" name="specs[gurultu]" class="form-control" placeholder="Aktif Gürültü Engelleme">
                    </div>
                </div>
            </div>
 
            {{-- Tablet Özellikleri --}}
            <div id="specs-Tablet" class="specs-section" style="display:none;">
                <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">📲 Tablet Özellikleri</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Ekran Boyutu</label>
                        <input type="text" name="specs[ekran]" class="form-control" placeholder="11 inç">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>İşlemci</label>
                        <input type="text" name="specs[islemci]" class="form-control" placeholder="Apple M2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Depolama</label>
                        <input type="text" name="specs[depolama]" class="form-control" placeholder="128 GB">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Çözünürlük</label>
                        <input type="text" name="specs[cozunurluk]" class="form-control" placeholder="2360 x 1640">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Batarya</label>
                        <input type="text" name="specs[batarya]" class="form-control" placeholder="7606 mAh">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Bağlantı</label>
                        <input type="text" name="specs[baglanti]" class="form-control" placeholder="Wi-Fi / 5G">
                    </div>
                </div>
            </div>
 
            {{-- Monitör Özellikleri --}}
            <div id="specs-Monitör" class="specs-section" style="display:none;">
                <h5 class="mt-3 mb-3 text-primary border-bottom pb-2">🖥️ Monitör Özellikleri</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Ekran Boyutu</label>
                        <input type="text" name="specs[ekran]" class="form-control" placeholder="27 inç">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Çözünürlük</label>
                        <input type="text" name="specs[cozunurluk]" class="form-control" placeholder="2560 x 1440">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Yenileme Hızı</label>
                        <input type="text" name="specs[yenileme]" class="form-control" placeholder="144 Hz">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Panel Tipi</label>
                        <input type="text" name="specs[panel]" class="form-control" placeholder="IPS">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tepki Süresi</label>
                        <input type="text" name="specs[tepki]" class="form-control" placeholder="1 ms">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Bağlantı Noktaları</label>
                        <input type="text" name="specs[baglanti]" class="form-control" placeholder="HDMI, DisplayPort">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100">
                Ürünü Kaydet
            </button>
        </form>
    </div>
</div>
<script>
function showSpecs() {
    const category = document.getElementById('categorySelect').value;
    
    // Tüm spec alanlarını gizle
    document.querySelectorAll('.specs-section').forEach(el => {
        el.style.display = 'none';
        // Gizlenen alanların inputlarını temizle
        el.querySelectorAll('input').forEach(input => input.value = '');
    });
 
    // Seçilen kategorinin alanlarını göster
    if (category) {
        const section = document.getElementById('specs-' + category);
        if (section) section.style.display = 'block';
    }
}
</script>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
