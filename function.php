<?php 
// koneksikan ke database

$koneksi = mysqli_connect("localhost", "root", "", "pkk");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($sws = mysqli_fetch_assoc($result)) {
        $rows[] = $sws;
    }
    return $rows;
}

function tambah ($data)
{
    global $koneksi;
    //ambil data dari form ( input )
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);


     //upload gambar
     $gambar = upload();
     if (!gambar) {
         return false;
     }


    //query insert data
    $query = "INSERT INTO siswa
    VALUES (id, '$nim', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload()
{
    $namaFILE = $_FILES['gambar']['name'];
    $ukuranFILE = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if ($error === 4){
        echo    "<script>
        alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;    
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['JPG', 'jpeg', 'png', 'jpg', 'PNG', 'JPEG'];
    $ekstensiGambar = explode('.', $namaFILE);
    //fumgsi explode itu string aray
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo    "<script>
        alert('yang anda upload bukan gambar!');
            </script>";
    }

}


function ubah ($data)
{
    global $koneksi;
    //ambil data dari form ( input )
    $id = htmlspecialchars($data["id"]);
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    //query edit data
    $query = "UPDATE siswa SET 
    nim = '$nim', 
    nama = '$nama', 
    email = '$email', 
    jurusan = '$jurusan',
    gambar = '$gambar' 
    WHERE id=$id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function cari($keyword){
    $query = "SELECT * FORM siswa
                 WHERE
                 nim LIKE '&$keyword&' OR
                 nama LIKE '&$keyword&' OR
                 email LIKE '&$keyword&' OR
                 jurusan LIKE '&$keyword&' 
            ";
    return query($query);
}

?>
