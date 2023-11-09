<?php 
require '../connection.php';

$sql = "SELECT * FROM beli";
$data = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Beli</title>
</head>
<body>
    <div class="sidebar">
        <h2>MENU</h2>
        <a href="../barang/index.php">- Barang</a>
        <a href="#">- Beli</a>
        <a href="../jual/index.php">- Jual</a>
    </div>
    <div class="content">
    <h1>Data Beli</h1>
    <a href="add.php" class='btn btn-primary' style="margin: 10px;">+ Tambah Data</a>
    <table border="5px" class="table">
    <thead>
        <tr class="table-dark">
            <th>NOMOR FAKTUR</th>
            <th>TANGGAL</th>
            <th>KODE BARANG</th>
            <th>QUANTITY</th>
            <th colspan="2">ACTION</th>
        </tr>
    </thead>
    <tbody>
            <?php
            while ($result = $data->fetch_assoc()){
            echo "<tr class='table-info'>";
            echo "<td>". $result['nofaktur'] ."</td>";
            echo "<td>". $result['tgl'] ."</td>";
            echo "<td>". $result['kodebrg'] ."</td>";
            echo "<td>". $result['qty'] ."</td>";
            echo "<td><a class='btn btn-primary' href='update.php?id=". $result['nofaktur'] ."'>Ubah</a></td>";
            echo "<td><a class='btn btn-danger' href='delete.php?id=". $result['nofaktur'] ."'>Delete</a></td>";
            echo "</tr>";
            }
            ?> 
    </tbody>       
    </table>
    </div>
</body>
</html>