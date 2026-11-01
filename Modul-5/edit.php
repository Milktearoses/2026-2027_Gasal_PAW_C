<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id = $id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $telp   = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $query = "UPDATE supplier SET nama = '$nama', telp = '$telp', alamat = '$alamat' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: tabel.php");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .field { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 300px; padding: 6px; }
        textarea { height: 80px; }
        .btn { padding: 6px 12px; color: white; border: none; cursor: pointer; border-radius: 4px; text-decoration: none; display: inline-block; }
        .btn-update { background-color: #ff9800; }
        .btn-batal { background-color: #f44336; }
    </style>
</head>
<body>

    <h3>Edit Data Master Supplier</h3>
    <form action="" method="POST">
        <div class="field">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $row['nama']; ?>" required>
        </div>
        <div class="field">
            <label>Telp</label>
            <input type="text" name="telp" value="<?= $row['telp']; ?>" required>
        </div>
        <div class="field">
            <label>Alamat</label>
            <textarea name="alamat" required><?= $row['alamat']; ?></textarea>
        </div>
        <div class="field">
            <button type="submit" name="update" class="btn btn-update">Update</button>
            <a href="tabel.php" class="btn btn-batal">Batal</a>
        </div>
    </form>

</body>
</html>