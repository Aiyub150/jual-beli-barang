<?php
require '../connection.php';

$sql = "SELECT * FROM barang";
$data = $conn->query($sql);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tgl = $_POST['tgl'];
    $kodebrg = $_POST['kodebrg'];
    $qty = $_POST['qty'];

    $sql = "INSERT INTO beli (tgl, kodebrg, qty) VALUES ('$tgl', '$kodebrg', '$qty')";
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
    <title>Beli - Tambah</title>
</head>
<body>
    <div class="sidebar">
        <h2>MENU</h2>
        <a href="../barang/index.php">- Barang</a>
        <a href="#">- Beli</a>
        <a href="../jual/index.php">- Jual</a>
    </div>
    <div class="content">
    <h2>Tambah Data Beli</h2>
    <form action="" method="POST">
        <input class="form-control" style="margin: 10px;" type="date" placeholder="Masukkan Tanggal" name="tgl" required>        
        <select class="form-control" name="kodebrg" id="">
            <option value="">Pilih Barang</option>
            <?php
            while($result = $data->fetch_assoc()){
                echo "<option value='". $result['kodebrg'] ."'>". $result['nama'] ."</option>";
            }
            ?>
        </select>
        <input class="form-control" style="margin: 10px;" type="number" min="0" placeholder="Masukkan Quantity" name="qty" required>
        <button style="margin: 10px;" class="btn btn-success" type="submit">Simpan</button>
        <button style="margin: 10px;" class="btn btn-danger" type="reset">Reset</button>
    </form>
    </div>

</body>
</html>