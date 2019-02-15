<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
    
    // koneksi ke function
require 'function/functions.php';

    // cek apakah tombol submit berfungsi atau tidak
if (isset($_POST["submit"])) {
    if (tambahBiaya($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'biaya.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'biaya.php';
            </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Sistem Informasi - Tambah Data Biaya Semester</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/styler.css?v=1.0">
    <link rel="stylesheet" href="css/tambah.css">
    <script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div class="header">
        <h3 class="text-secondary font-weight-bold float-left logo">SISFO</h3>
        <h3 class="text-secondary float-left logo2">Database</h3>
        <a href="logout.php" class=" float-right log"><i class="fas fa-sign-out-alt"></i></a>
    </div>

    <div class="sidebar">
        <nav>
            <ul>
                <li>
                    <img src="img/profile.png" class="img-fluid profile" width="60px">
                    <h5 class="admin float-right">Admin</h5>
                    <div class="online">
                        <p class="float-right ontext">Online</p>
                        <div class="on float-right"></div>
                    </div>
                </li>
                <!-- fungsi slide -->
                <script> 
                $(document).ready(function(){
                    $("#flip").click(function(){
                        $("#panel").slideToggle("medium");
                        $("#panel2").slideToggle("medium");
                    });
                    $("#flip2").click(function(){
                        $("#panel3").slideToggle("medium");
                        $("#panel4").slideToggle("medium");
                    });
                });
                </script>

                <!-- dashboard -->
                <li class="klik" id="flip" style="cursor:pointer;">
                    <div>
                        <span class="fas fa-tachometer-alt"></span>
                        <span>Dashboard</span>
                        <i class="fas fa-caret-right float-right" style="line-height: 20px;"></i>
                    </div>
                </li>

                <a href="index.php" class="linkAktif">
                    <li id="panel" style="display: none;">
                        <div style="margin-left: 20px;">
                            <span><i class="fa fa-user"></i></span>
                            <span>Data Mahasiswa</span>
                        </div>
                    </li>
                </a>

                <a href="biaya.php" class="linkAktif">
                    <li id="panel2" style="display: none;">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-file-invoice-dollar"></i></span>
                            <span>Biaya Pendidikan</span>
                        </div>
                    </li>
                </a>
                <!-- dashboard -->

                <!-- Input -->
                <li class="klik2" id="flip2" style="cursor:pointer;">
                    <div>
                        <span class="fas fa-plus-circle"></span>
                        <span>Input Data</span>
                        <i class="fas fa-caret-up float-right" style="line-height: 20px;"></i>
                    </div>
                </li>

                <a href="tambah.php" class="linkAktif">
                    <li id="panel3">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-user-plus"></i></span>
                            <span> Mahasiswa</span>
                        </div>
                    </li>
                </a>

                <a href="tambahBiaya.php" class="linkAktif">
                    <li class="aktif" id="panel4" style="border-left: 5px solid #306bff;">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-hand-holding-usd"></i></span>
                            <span>Biaya Pendidikan</span>
                        </div>
                    </li>
                </a>
                <!-- Input -->
                
                <!-- change icon -->
                <script>
                    $(".klik").click(function () {
                        $(this).find('i').toggleClass('fa-caret-up fa-caret-right');
                        if ($(".klik").not(this).find("i").hasClass("fa-caret-right")) {
                            $(".klik").not(this).find("i").toggleClass('fa-caret-up fa-caret-right');
                        }
                    });
                    $(".klik2").click(function () {
                        $(this).find('i').toggleClass('fa-caret-up fa-caret-right');
                        if ($(".klik2").not(this).find("i").hasClass("fa-caret-right")) {
                            $(".klik2").not(this).find("i").toggleClass('fa-caret-up fa-caret-right');
                        }
                    });
                </script>
                <!-- change icon -->
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <div class="konten">
            <div class="konten_dalem">
                <h2 class="head" style="color: #4b4f58;">Tambah Data Biaya Mahasiswa</h2>
                <hr style="margin-top: -5px;">
                <div class="headline">
                    <h5>Tambah Data Biaya Mahasiswa</h5>
                </div>
                <div class="container">
                    <div class="konten_isi">
                        <table class="table-sm">
                            <script type="text/javascript" src="js/pisahTitik.js"></script>
                            <form class="form-text" action="" method="post">
                                <tr>
                                    <td>Masukkan NIM Mahasiswa</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="text" name="nim" required></td>
                                </tr>
                                <tr>
                                    <td>Masukkan Nama Mahasiswa</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="text" name="nama" required></td>
                                </tr>
                                <tr>
                                    <td>Masukkan Jumlah BPP</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="text" name="bpp" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required></td>
                                </tr>
                                <tr>
                                    <td>Masukkan Jumlah Asuransi</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="text" name="asuransi" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <center><button class="btn btn-primary btn-block" type="submit" name="submit">tambah
                                                data</button></center>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>