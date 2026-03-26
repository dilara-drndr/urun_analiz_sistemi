<!DOCTYPE html>
<html>
<head>
    <title>Ürün Ekle</title>
</head>
<body>
    <h1>Admin - Ürün Ekle</h1>

    <form method="POST" action="/admin/products">
        @csrf

        <input type="text" name="name" placeholder="Ürün adı" required><br><br>
        <input type="text" name="category" placeholder="Kategori" required><br><br>
        <textarea name="description" placeholder="Açıklama"></textarea><br><br>
        <input type="number" name="price" placeholder="Fiyat" step="0.01" required><br><br>
        <input type="number" name="stock" placeholder="Stok" required><br><br>

        <button type="submit">Kaydet</button>
    </form>
</body>
</html>
