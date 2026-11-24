<?php include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id'");
$row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Barang</title></head>
<body style="font-family:Arial; padding:20px">
<h2>Edit Barang</h2>
<form method="POST">
    <input type="text" name="kode_barang" value="<?= $row['kode_barang']; ?>" required><br><br>
    <input type="text" name="nama_barang" value="<?= $row['nama_barang']; ?>" required><br><br>
    <select name="kategori">
        <option value="Komputer" <?= $row['kategori']=='Komputer'?'selected':''; ?>>Komputer</option>
        <option value="Jaringan" <?= $row['kategori']=='Jaringan'?'selected':''; ?>>Jaringan</option>
        <option value="Aksesoris" <?= $row['kategori']=='Aksesoris'?'selected':''; ?>>Aksesoris</option>
    </select><br><br>
    <input type="number" name="jumlah" value="<?= $row['jumlah']; ?>" required><br><br>
    <select name="kondisi">
        <option value="Baik" <?= $row['kondisi']=='Baik'?'selected':''; ?>>Baik</option>
        <option value="Rusak Ringan" <?= $row['kondisi']=='Rusak Ringan'?'selected':''; ?>>Rusak Ringan</option>
        <option value="Rusak Berat" <?= $row['kondisi']=='Rusak Berat'?'selected':''; ?>>Rusak Berat</option>
    </select><br><br>
    <input type="date" name="tanggal_masuk" value="<?= $row['tanggal_masuk']; ?>" required><br><br>
    <button type="submit" name="update">Update</button>
    <a href="index.php">Kembali</a>
</form>
</body>
</html>

<?php
// UPDATE
if(isset($_POST['update'])){
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $tanggal = $_POST['tanggal_masuk'];

    mysqli_query($koneksi, "UPDATE tb_barang SET kode_barang='$kode', nama_barang='$nama', kategori='$kategori', jumlah='$jumlah', kondisi='$kondisi', tanggal_masuk='$tanggal' WHERE id_barang='$id'");
    echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
}
?>