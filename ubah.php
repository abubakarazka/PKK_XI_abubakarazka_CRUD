<?php
//dipakai function
require 'function.php';

//diambil dari URL
$id = $_GET["id"];

//query untuk menentukan berdasarkan ID
$siswa = query("SELECT * FROM siswa WHERE id=$id");

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["update"])){
    //cek apakah data berhasil diubahkan atau tidak
    if (ubah($_POST) > 0) {
        echo"
        <script>
        alert('data telah berhasil diubah');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo"
        <script>
        alert('data telah gagal diubah');
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>update data siswa</title>
</head>

<body>
    <h1>update data siswa<h1>

    <form action="" method="post">
    <ul>
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" require>
        <li>
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" value="<?php echo $siswa[0]["nim"]; ?>" require>
        </li>
        <li>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?php echo $siswa[0]["nama"];?>" require>
        </li>
        <li>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo $siswa[0]["email"];?>" require>
        </li>
        <li>
            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" value="<?php echo $siswa[0]["jurusan"];?>" require>
        </li>
        <li>
            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" id="gambar" value="<?php echo $siswa[0]["gambar"];?>" require>
        </li>
        <li>
            <button type="submit" name="update">update data</button>
        </li>
    </ul>
    </form>
</body>

</html>