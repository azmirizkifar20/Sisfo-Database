<?php 
    require 'functions.php';
    // tambah data biaya
    $nim2 = htmlspecialchars($_POST["nim"]);
    $nama2 = htmlspecialchars($_POST["nama"]);
    $bpp = htmlspecialchars($_POST["bpp"]);
    $asuransi = htmlspecialchars($_POST["asuransi"]);

    // query insert data
    $query = "INSERT INTO biaya VALUES ('', '$nim2', '$nama2', '$bpp', '$asuransi')";
    mysqli_query($koneksi, $query);           
?>