<?php
require '../connection.php';

$sql_barang = "SELECT * FROM barang";
$data_barang = $conn->query($sql_barang);


if(isset($_GET['id'])){
    $nofaktur = $_GET['id'];
    $sql = "SELECT * FROM beli WHERE nofaktur='$nofaktur'";
    $data = $conn->query($sql);
    $result = $data->fetch_assoc();

    $tgl = $result['tgl'];
    $kodebrg = $result['kodebrg'];
    $qty = $result['qty'];

    $sql2 = "SELECT * FROM barang WHERE kodebrg='$kodebrg'";
    $data2 = $conn->query($sql2);
    $result2 = $data2->fetch_assoc();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nofaktur = $_GET['id'];
    $tgl = $_POST['tgl'];
    $kodebrg = $_POST['kodebrg'];
    $qty = $_POST['qty'];

    $sql = "UPDATE beli SET tgl='$tgl', kodebrg='$kodebrg', qty='$qty' WHERE nofaktur='$nofaktur'";
    if($conn->query($sql) == true){
        header("location: index.php");
    } else {
        echo "Terdapat Kesalahan Saat Mengubah Data";
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
    <title>Beli - Ubah</title>
</head>
<body>
    <div class="sidebar">
        <h2>MENU</h2>
        <a href="../barang/index.php">- Barang</a>
        <a href="#">- Beli</a>
        <a href="../jual/index.php">- Jual</a>
    </div>
    <div class="content">
    <h2>Ubah Data Beli Nomor Faktur <?php echo $nofaktur ?></h2>
    <form action="" method="POST">
        <input class="form-control" style="margin: 10px;" type="date" placeholder="Masukkan Tanggal" name="tgl" value="<?php echo $tgl ?>" required>
        <select class="form-control" name="kodebrg" id="">
            <?php
            echo "<option value='". $kodebrg ."'>". $result2['nama'] ."</option>";
            while($result_b = $data_barang->fetch_assoc()){
                echo "<option value='". $result_b['kodebrg'] ."'>". $result_b['nama'] ."</option>";
            }
            ?>
        </select>
        <input class="form-control" style="margin: 10px;" type="number" min="0" placeholder="Masukkan Quantity" name="qty" value="<?php echo $qty ?>" required>
        <button style="margin: 10px;" class="btn btn-success" type="submit">Simpan</button>
        <button style="margin: 10px;" class="btn btn-danger" type="reset">Reset</button>
    </form>
    </div>

</body>
</html>