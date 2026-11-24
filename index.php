<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventaris Lab Komputer</title>
    <style>
        body{font-family:Arial; padding:20px; background:#f4f4f4}
        table{width:100%; border-collapse:collapse; background:white}
        th,td{border:1px solid #ddd; padding:10px; text-align:left}
        th{background:#2c3e50; color:white}
        a{padding:5px 10px; text-decoration:none; border-radius:5px}
        .edit{background:orange; color:white}
        .hapus{background:red; color:white}
        .tambah{background:green; color:white; display:inline-block; margin-bottom:15px}
        input,select{padding:8px; margin:5px 0; width:100%}
        form{background:white; padding:20px; margin-bottom:20px; border-radius:8px}
    </style>
</head>
<body>

<h2>Aplikasi Manajemen Inventaris Barang Lab Komputer</h2>

<form method="POST" action="">
    <h3>Tambah Barang</h3>
    <input type="text" name="kode_barang" placeholder="Kode Barang (INV-PC-001)" required>
    <input type="text" name="nama_barang" placeholder="Nama Barang (Monitor LED 24 Inch)" required>
    <select name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Komputer">Komputer</option>
        <option value="Jaringan">Jaringan</option>
        <option value="Aksesoris">Aksesoris</option>
    </select>
    <input type="number" name="jumlah" placeholder="Jumlah" required>
    <select name="kondisi" required>
        <option value="">-- Pilih Kondisi --</option>
        <option value="Baik">Baik</option>
        <option value="Rusak Ringan">Rusak Ringan</option>
        <option value="Rusak Berat">Rusak Berat</option>
    </select>
    <input type="date" name="tanggal_masuk" required>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
// CREATE
if(isset($_POST['simpan'])){
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $tanggal = $_POST['tanggal_masuk'];

    $query = "INSERT INTO tb_barang (kode_barang, nama_barang, kategori, jumlah, kondisi, tanggal_masuk)
              VALUES ('$kode','$nama','$kategori','$jumlah','$kondisi','$tanggal')";
    mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil ditambah'); window.location='index.php';</script>";
}
?>

<table>
    <tr>
        <th>ID</th><th>Kode</th><th>Nama Barang</th><th>Kategori</th><th>Jumlah</th><th>Kondisi</th><th>Tanggal Masuk</th><th>Aksi</th>
    </tr>
    <?php
    // READ
    $data = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC");
    while($row = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?= $row['id_barang']; ?></td>
        <td><?= $row['kode_barang']; ?></td>
        <td><?= $row['nama_barang']; ?></td>
        <td><?= $row['kategori']; ?></td>
        <td><?= $row['jumlah']; ?></td>
        <td><?= $row['kondisi']; ?></td>
        <td><?= $row['tanggal_masuk']; ?></td>
        <td>
            <a class="edit" href="edit.php?id=<?= $row['id_barang']; ?>">Edit</a>
            <a class="hapus" href="hapus.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>

index