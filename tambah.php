<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Barang</title></head>
<body style="font-family:Arial; padding:20px">
<h2>Tambah Barang</h2>
<form method="POST">
    <label>Kode Barang</label><br>
    <input type="text" name="kode_barang" placeholder="INV-PC-001" required><br><br>
    <label>Nama Barang</label><br>
    <input type="text" name="nama_barang" placeholder="Monitor LED 24 Inch" required><br><br>
    <label>Kategori</label><br>
    <select name="kategori" required>
        <option value="">-- Pilih --</option>
        <option value="Komputer">Komputer</option>
        <option value="Jaringan">Jaringan</option>
        <option value="Aksesoris">Aksesoris</option>
    </select><br><br>
    <label>Jumlah</label><br>
    <input type="number" name="jumlah" required><br><br>
    <label>Kondisi</label><br>
    <select name="kondisi" required>
        <option value="">-- Pilih --</option>
        <option value="Baik">Baik</option>
        <option value="Rusak Ringan">Rusak Ringan</option>
        <option value="Rusak Berat">Rusak Berat</option>
    </select><br><br>
    <label>Tanggal Masuk</label><br>
    <input type="date" name="tanggal_masuk" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
    <a href="index.php">Kembali</a>
</form>
</body>
</html>

<?php
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