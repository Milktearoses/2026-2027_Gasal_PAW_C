<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $telp   = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: tabel.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .field { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 300px; padding: 6px; }
        textarea { height: 80px; }
        .btn { padding: 6px 12px; color: white; border: none; cursor: pointer; border-radius: 4px; text-decoration: none; display: inline-block; }
        .btn-simpan { background-color: #4CAF50; }
        .btn-batal { background-color: #f44336; }
    </style>
</head>
<body>

    <h3>Tambah Data Master Supplier Baru</h3>
    <form action="" method="POST">
        <div class="field">
            <label>Nama</label>
            <input type="text" name="nama" required>
        </div>
        <div class="field">
            <label>Telp</label>
            <input type="text" name="telp" required>
        </div>
        <div class="field">
            <label>Alamat</label>
            <textarea name="alamat" required></textarea>
        </div>
        <div class="field">
            <button type="submit" name="submit" class="btn btn-simpan">Simpan</button>
            <a href="tabel.php" class="btn btn-batal">Batal</a>
        </div>
    </form>

</body>
</html>
