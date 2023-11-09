<?php 
require '../connection.php';

$sql = "SELECT * FROM barang";
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
    <title>Barang</title>
</head>
<body>
    <div class="sidebar">
        <h2>MENU</h2>
        <a href="#">- Barang</a>
        <a href="../beli/index.php">- Beli</a>
        <a href="../jual/index.php">- Jual</a>
    </div>
    
    <div class="content">
    <h1>Data Barang</h1>
    <a href="add.php" style="margin: 10px;" class="btn btn-primary">+ Tambah Data</a>
    <table border="5px" class="table">
        <thead>
        <tr class="table-dark">
            <th scope="col">KODE BARANG</th>
            <th scope="col">NAMA</th>
            <th scope="col">SATUAN</th>
            <th scope="col">STOK</th>
            <th colspan="2" scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>
            <?php
            while ($result = $data->fetch_assoc()){
            echo "<tr class='table-info'>";
            echo "<td scope='row'>". $result['kodebrg'] ."</td>";
            echo "<td>". $result['nama'] ."</td>";
            echo "<td>". $result['satuan'] ."</td>";
            echo "<td>". $result['stok'] ."</td>";
            echo "<td><a class='btn btn-primary' href='update.php?id=". $result['kodebrg'] ."'>Ubah</a></td>";
            echo "<td><a class='btn btn-danger' href='delete.php?id=". $result['kodebrg'] ."'>Delete</a></td>";
            echo "</tr>";
            }
            ?> 
        </tbody>       
    </table>
    </div>
</body>
</html>