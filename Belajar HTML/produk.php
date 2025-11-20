<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produk</title>
    <style>
        body{
            /* font-family: Arial, Helvetica, sans-serif;
            margin: 20px; */
            
        }
        form{
            margin-top: 10px;


          
        }
        table{
            margin-top: 15px;
            size: 14px;
            
  
        }
        table th{
            background-color: lightblue;
            padding: 10px;
        }
        table td{
            background-color: lightgray;
            padding: 5px;
        }
        
    </style>
</head>
<body background="bg.jpg">
    <form action="" method=get >
        <input type="text" name="cari" placeholder="cari produk">
        <input type="submit" value="cari">
    </form>
    <a href = "create-produk.php">Tambah barang</a>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>kategori</th>
            <th>Deskripsi</th>
            <th>stok</th>
            <th>harga</th>
            <th>Gambar</th>
            <th>Size</th>
        </tr>
        <?php
        include "koneksi.php";
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $sql = "SELECT * FROM produk2 WHERE nama LIKE '%$cari%' OR kategori='%$cari%'";
            // $sql = "SELECT * FROM produk WHERE NAMA ='$cari' OR kategori='$cari'";
            
        }else{
            $sql = "SELECT * FROM produk2";
        }
       
        $query = mysqli_query($koneksi, $sql);
        $no = 1;
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['kategori'] ?></td>
                <td><?= $data['deskripsi'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= $data['harga'] ?></td>
                <td><img src ='image/<?= $data['gambar'] ?>' width="100" height="100"></td>
                <td>
                <a href="delete-produk.php?id=<?=$data['id']?> "onclick="return confirm('yakin hapus data ini?')">Hapus</a>
                <!-- <a href="edit-produk.php?id=<?=$data['id']?>">edit</a> -->
                </td>
            </tr>
            <?php
               if(file_exists('image/'.$data['gambar'])){
                ?>
                <img src="<?= $target_file?>" alt="" width="-10" height="-10">
                <?php
            }
            ?>
            </td>
            </tr>
            <?php
        }
        ?>
</table>
    
</body>
</html>