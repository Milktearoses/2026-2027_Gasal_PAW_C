<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM supplier");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 6px 12px; color: white; text-decoration: none; border-radius: 4px; }
        .btn-tambah { background-color: #4CAF50; display: inline-block; margin-bottom: 10px; }
        .btn-edit { background-color: #ff9800; }
        .btn-hapus { background-color: #f44336; }
    </style>
</head>
<body>

    <h2>Data Master Supplier</h2>
    <a href="tambah.php" class="btn btn-tambah">Tambah Data</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php 
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) : 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['telp']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-hapus" onclick="return confirm('Anda yakin akan menghapus supplier ini?');">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>