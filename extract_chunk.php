<?php
// test_foto.php - Test memanggil foto dari database

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Ambil semua foto dari database
$fotos = DB::table('koleksi_fotos')->get();

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Test Foto dari Database</title>";
echo "<style>";
echo "body { font-family: Arial; padding: 20px; background: #f0f0f0; }";
echo "h1 { color: #333; }";
echo ".gallery { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }";
echo ".card { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }";
echo ".card img { width: 100%; height: 200px; object-fit: cover; }";
echo ".card p { padding: 10px; margin: 0; text-align: center; font-size: 14px; }";
echo ".info { background: #fff; padding: 15px; border-radius: 10px; margin-bottom: 20px; }";
echo "</style>";
echo "</head>";
echo "<body>";

echo "<h1>📸 Test Memanggil Foto dari Database</h1>";

echo "<div class='info'>";
echo "<strong>Total foto di database:</strong> " . $fotos->count() . " foto";
echo "</div>";

if ($fotos->count() > 0) {
    echo "<div class='gallery'>";
    
    foreach ($fotos as $foto) {
        echo "<div class='card'>";
        // Tampilkan foto dari BLOB
        if ($foto->file_foto) {
            echo "<img src='data:image/jpeg;base64," . base64_encode($foto->file_foto) . "' alt='" . $foto->nama_foto . "'>";
        } else {
            echo "<div style='height:200px; background:#ccc; display:flex; align-items:center; justify-content:center;'>❌ No Image Data</div>";
        }
        echo "<p><strong>" . $foto->nama_foto . "</strong><br>";
        echo "<small>ID: " . $foto->id . "</small></p>";
        echo "</div>";
    }
    
    echo "</div>";
} else {
    echo "<p style='color:red;'>⚠️ Tidak ada data di tabel koleksi_fotos!</p>";
}

echo "</body>";
echo "</html>";
?>