<?php
require '../connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = $_POST['nama'];
    $satuan = $_POST['satuan'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO barang (nama, satuan, stok) VALUES ('$nama', '$satuan', '$stok')";
    if($conn->query($sql) == true){
        header("location: index.php");
    } else {
        echo "Terdapat Kesalahan Saat Menambah Data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Barang - Tambah</title>
</head>
<body>
    <div class="sidebar">
        <h2>MENU</h2>
        <a href="#">- Barang</a>
        <a href="../beli/index.php">- Beli</a>
        <a href="../jual/index.php">- Jual</a>
    </div>
    <div class="content">
    <h2>Tambah Data Barang</h2>
    <form action="" method="POST">
        <input style="margin: 10px;" class="form-control" type="text" placeholder="Masukkan Nama Barang" name="nama" required>
        <input style="margin: 10px;" class="form-control" type="text" placeholder="Masukkan Satuan" name="satuan" required>
        <input style="margin: 10px;" class="form-control" type="number" min="0" placeholder="Masukkan Stok" name="stok" required>
        <button style="margin: 10px;" class="btn btn-success" type="submit">Simpan</button>
        <button style="margin: 10px;" class="btn btn-danger" type="reset">Reset</button>
    </form>
    </div>

</body>
</html>