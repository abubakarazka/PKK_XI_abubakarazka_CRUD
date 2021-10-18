<?php 
require 'function.php';
$siswa = query("SELECT * FROM siswa");

//tombol cari ditekan

if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman admin</title>
</head>
<body>
    <h1>daftar siswa</h1>
    <a href="tambah.php">tambah data siswa</a>
    <br>
    <br>
    <form action="" method="post">
    <input type="text" name="keyword" id="" size="50" autofocus
    placeholder="masukan keyword pencarian!" autocomplete="off">
    <button type="submit" name="cari"> cari! </button>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
         <tr>
             <td>No.</td>
             <td>Aksi</td>
             <td>Gambar</td>
             <td>NIM</td>
             <td>Nama</td>
             <td>Email</td>
             <td>Jurusan</td>
         </tr>
         <?php $i =1;?>
         <?php foreach ($siswa as $sws) :?>
         <tr>
             <td><?= $i?></td>
             <td>
                <a href="ubah.php?id=<?= $sws["id"]?>">ubah</a>
                <a href="hapus.php?id=<?= $sws["id"]?>"oneklik="return confirm('yakin mau di hapus?');">hapus</a>
             </td>
             <td><img src="img/<?= $sws["gambar"]?>" alt="" width="100"></td>
             <td><?= $sws["nim"]?></td>
             <td><?= $sws["nama"]?></td>
             <td><?= $sws["email"]?></td>
             <td><?= $sws["jurusan"]?></td>
         </tr>
       <?php $i++ ?>
         <?php endforeach;?>  
             
         
        
   
    </table>
</body>

</html>