<?php
// Kalkulator Biaya Nikah Sederhana
$total_biaya = 0;
$tabungan_perbulan = 0;
$target_bulan = 0;

// Kalau form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil input dari user
    $dekor = $_POST['dekor'];
    $catering = $_POST['catering'];
    $baju = $_POST['baju'];
    $gedung = $_POST['gedung'];
    $hiburan = $_POST['hiburan'];
    $lainnya = $_POST['lainnya'];
    $target_bulan = $_POST['target_bulan'];

    // Total biaya nikah   
    $total_biaya = $dekor + $catering + $baju + $gedung + $hiburan + $lainnya;

    // Hitung tabungan per bulan  
    if ($target_bulan > 0) {
        $tabungan_perbulan = $total_biaya / $target_bulan;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Biaya Nikah 💍</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f7f8fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            background: #fff;
            margin: 40px auto;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #444;
        }
        label {
            font-weight: 600;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 6px 0 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #0056d2;
        }
        .result {
            background: #f1f8ff;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
        }
        .result h3 {
            margin-top: 0;
            color: #007bff;
        }
        .angka {
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>💒 Kalkulator Biaya Nikah</h2>
    <form method="POST" action="">
        <label>Biaya Dekorasi:</label>
        <input type="number" name="dekor" placeholder="Misal: 5000000" required>

        <label>Biaya Catering:</label>
        <input type="number" name="catering" placeholder="Misal: 30000000" required>

        <label>Biaya Baju & Makeup:</label>
        <input type="number" name="baju" placeholder="Misal: 7000000" required>

        <label>Sewa Gedung:</label>
        <input type="number" name="gedung" placeholder="Misal: 10000000" required>

        <label>Hiburan (band, MC, dll):</label>
        <input type="number" name="hiburan" placeholder="Misal: 5000000" required>

        <label>Biaya Lainnya:</label>
        <input type="number" name="lainnya" placeholder="Misal: 3000000" required>

        <label>Target Waktu Nabung (bulan):</label>
        <input type="number" name="target_bulan" placeholder="Misal: 12" required>

        <button type="submit">Hitung 💰</button>
    </form>

    <?php if ($total_biaya > 0): ?>
    <div class="result">
        <h3>💸 Hasil Perhitungan</h3>
        <p>Total Biaya Nikah: <span class="angka">Rp <?= number_format($total_biaya, 0, ',', '.') ?></span></p>
        <p>Waktu Menabung: <span class="angka"><?= $target_bulan ?> bulan</span></p>
        <p>Harus Nabung Per Bulan: <span class="angka">Rp <?= number_format($tabungan_perbulan, 0, ',', '.') ?></span></p>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
