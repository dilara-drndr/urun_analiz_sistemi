<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=urun_analiz', 'root', '');
    echo "Bağlantı başarılı!";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}