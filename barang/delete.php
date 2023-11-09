<?php
require '../connection.php';

if(isset($_GET['id'])){
    $kodebrg = $_GET['id'];

    $sql = "DELETE FROM barang WHERE kodebrg='$kodebrg'";
    if($conn->query($sql) == true){
        header("location: index.php");
    } else {
        echo "Terdapat Kesalahan Saat Menghapus Data";
    }
}
?>