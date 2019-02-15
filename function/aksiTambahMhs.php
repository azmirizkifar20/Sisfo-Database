<?php 
    require 'functions.php';
    // tambah data
    $nim = htmlspecialchars($_POST["nim"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $kelas = htmlspecialchars($_POST["kelas"]);
    $nilai = htmlspecialchars($_POST["nilai"]);

    // query insert data
    $query = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$kelas', '$nilai')";
    mysqli_query($koneksi, $query);           
    
    return mysqli_affected_rows($koneksi);
?>