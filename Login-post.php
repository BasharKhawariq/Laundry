<?php
session_start();
include "connection.php";
# session -> tmpt penyimpanan data di sisi server yg dpt
# diakses scr global pd halaman web yg membutuhkan

if (isset($_POST["login"])) {
    # menampung data username dan password
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    #ambil data karyawan sesuai username & passsword
    $sql = "select * from user where 
    username='$username' and password='$password'";
    $hasil = mysqli_query($connect, $sql);


    # cek hasil query
    # mysqli_num_rows -> cek jumlah baris hasil query
    if (mysqli_num_rows($hasil) > 0) {
        # login berhasil
        # data disimpan dalam session
        $user = mysqli_fetch_array($hasil);
        $_SESSION["user"] = $user;
         header("location:index.php");
    } else {
        # login gagal
         echo "<script>alert('login anda gagal');window.location='Login.php'</script>";
         // header("location:Login.php");
    }
}
?>