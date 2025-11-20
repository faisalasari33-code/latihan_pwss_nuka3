<?php
include "koneksi.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM produk2 WHERE id = $id";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        echo "Data dengan id $id berhasil dihapus";
        header("Location:produk.php");      
    }else{
        echo "Gagal menghapus data";
}
}
