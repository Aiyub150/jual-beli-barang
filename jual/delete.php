<?php
require '../connection.php';

if(isset($_GET['id'])){
    $nofaktur = $_GET['id'];

    $sql = "DELETE FROM jual WHERE nofaktur='$nofaktur'";
    if($conn->query($sql) == true){
        header("location: index.php");
    } else {
        echo "Terdapat Kesalahan Saat Menghapus Data";
    }
}
?>