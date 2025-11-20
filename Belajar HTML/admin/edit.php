<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['id'])){
        echo "<script>windows.location.href='produk.php' </script>";
    }
    include "koneksi.php";
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    //proses edit dat
     if(isset($_POST['simpan'])){
        include "koneksi.php";
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
        $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
        $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah']);
        $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

        $gambar = $_FILES['gambar'];
        $nama_gambar = $gambar['name'];
        $size_gambar = $gambar['size'];
        $tmp_name = $gambar['tmp_name'];
        $target_file = 'image/'.$nama_gambar;

        if(is_uploaded_file($gambar['tmp_name']) == FALSE){
            $sql = "UPDATE produk2 SET Nama = '$nama' ,kategori = '$kategori' , Deskripsi = '$deskripsi' , jumlah = $jumlah , harga = $harga , WHERE id=$id";
            $query = mysqli_query($koneksi, $sql);
            if ($query){
                echo "<script>windows.location.href='produk.php' </script>";
            }
     }
    }
    ?>
</body>
</html>