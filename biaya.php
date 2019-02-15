<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// koneksi ke databse
include 'ajax/updateBiaya.php';
require 'function/functions.php';
        
// pagination
$jumlahDataPerHalaman = 6;
$jumlahData = count(query("SELECT * FROM biaya"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM biaya LIMIT $awalData, $jumlahDataPerHalaman");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Sistem Informasi - Biaya Semester</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/styler.css?v=1.0">
    <script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div class="header">
        <h3 class="text-secondary font-weight-bold float-left logo">SISFO</h3>
        <h3 class="text-secondary float-left logo2">Database</h3>
        <a href="logout.php" class="float-right log"><i class="fas fa-sign-out-alt"></i></a>
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
                <li>
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control border-right-0 cari" id="keyword" placeholder="Cari mahasiswa">
                        <div class="input-group-append">
                            <span class="input-group-text bg-white border-left-0 icone"><i class="fa fa-search"></i></span>
                        </div>
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
                        <i class="fas fa-caret-up float-right" style="line-height: 20px;"></i>
                    </div>
                </li>

                <a href="index.php" class="linkAktif">
                    <li id="panel">
                        <div style="margin-left: 20px;">
                            <span><i class="fa fa-user"></i></span>
                            <span>Data Mahasiswa</span>
                        </div>
                    </li>
                </a>

                <a href="biaya.php" class="linkAktif">
                    <li id="panel2" class="aktif" style="border-left: 5px solid #306bff;">
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
                        <i class="fas fa-caret-right float-right" style="line-height: 20px;"></i>
                    </div>
                </li>

                <a href="tambah.php" class="linkAktif">
                    <li id="panel3" style="display: none;">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-user-plus"></i></span>
                            <span> Mahasiswa</span>
                        </div>
                    </li>
                </a>

                <a href="tambahBiaya.php" class="linkAktif">
                    <li id="panel4" style="display: none;">
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

    <div class="main-content khusus">
        <div class="konten khusus2">
            <div class="konten_dalem khusus3">
                <h2 class="head" style="color: #4b4f58;">Data Biaya Mahasiswa</h2>
                <hr style="margin-top: -5px;">
                <div class="headline">
                    <h5>Data Biaya Mahasiswa</h5>
                </div>
                <div class="container" id="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-striped table-bordered">
                                    <tr>
                                        <th>No.</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>BPP</th>
                                        <th>Asuransi</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
    
                                    <?php $i = 1; ?>
                                    <?php foreach ($mahasiswa as $row) : ?>
                                    <tr class="show" id="<?= $row["id"]; ?>">
                                        <td><?= $i; ?> </td>
                                        <td data-target="nim"><?= $row["nim"]; ?></td>
                                        <td data-target="nama"><?= $row["nama"]; ?></td>
                                        <td data-target="bpp"><?php
                                                $bppnya = $row["bpp"];
                                                // konversi string nilai ke int + split
                                                $duitBpp = str_replace('.', '', $bppnya);
                                                $hasilBpp = number_format($duitBpp, 0, ',', '.');
                                                echo "$hasilBpp"
                                            ?></td>
                                        <td data-target="asuransi"><?php 
                                                $asuransinya = $row["asuransi"];
                                                // konversi string nilai ke int + split
                                                $duitAsuransi = str_replace('.', '', $asuransinya);
                                                $hasilAsuransi = number_format($duitAsuransi, 0, ',', '.');
                                                echo "$hasilAsuransi"
                                            ?></td>
                                        <td data-target="total"><?php
                                                // masukin nilai ke variabel
                                                $bppnya = $row["bpp"];
                                                $asuransinya = $row["asuransi"];
                                                // konversi string nilai ke int + split
                                                $duitBpp = str_replace('.', '', $bppnya);
                                                $duitAsuransi = str_replace('.', '', $asuransinya);
    
                                                $total = $duitBpp + $duitAsuransi;
                                                $hasilAkhir = number_format($total, 0, ',', '.');
    
                                                echo "$hasilAkhir"
                                            ?></td>
                                        <td>
                                            <a href="#" id="<?= $row["id"] ;?>" class="btn btn-info delete"><i class="fas fa-trash-alt"></i></a>
                                            <a href="#" data-role="update" data-id="<?= $row["id"] ;?>" class="btn btn-outline-secondary" id="openBtn"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <nav class="float-right page">
                            <ul class="pagination">

                                <?php if ($halamanAktif > 1) : ?>
                                <li class="page-item">
                                    <a href="?halaman=<?= $halamanAktif - 1 ?>" class="page-link">Previous</a>
                                </li>
                                <?php else : ?>
                                <li class="page-item">
                                    <div class="page-link">Previous</div>
                                </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                <?php if ($i == $halamanAktif) : ?>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="?halaman=<?= $i; ?>">
                                        <?= $i; ?></a>
                                </li>
                                <?php else : ?>
                                <li class="page-item" aria-current="page">
                                    <a class="page-link" href="?halaman=<?= $i; ?>">
                                        <?= $i; ?></a>
                                </li>
                                <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                                <li>
                                    <a href="?halaman=<?= $halamanAktif + 1 ?>" class="page-link" href="#">Next</a>
                                </li>
                                <?php else : ?>
                                <li class="page-item">
                                    <div class="page-link">Next</div>
                                </li>
                                <?php endif; ?>
                            </ul>

                        </nav>
                    </div>
                    <!-- export -->
                    <form action="export/excelBiaya.php" method="post">
                    <button type="submit" name="excel" class="btn btn-success export float-left"><i class="far fa-file-excel"></i>
                        save to excel</button>
                    </form>
                    <form action="export/pdfBiaya.php" method="post">
                        <button type="submit" name="pdf" class="btn btn-danger export pdf"><i class="far fa-file-pdf"></i> save
                            to PDF</button>
                    </form>
                    <!-- export -->
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn2" data-toggle="modal" data-target="#exampleModalCenter">
                <i class=" fas fa-hand-holding-usd"></i> Tambah Data
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Biaya Semester</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- isi form -->
        <form class="form-user2" method="post">
        <div class="modal-body">
            <script type="text/javascript" src="js/pisahTitik.js"></script>
                <div class="form-group">
                    <label>Masukkan NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Masukkan Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Masukkan Jumlah BPP</label>
                    <input type="text" name="bpp" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                </div>
                <div class="form-group">
                    <label>Masukkan Jumlah Asuransi</label>
                    <input type="text" name="asuransi" class="form-control" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                </div>
        </div>
        <!-- footer form -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary tambahin2">Tambah</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    <!-- Modal Tambah Data -->

    <!-- Modal edit data -->
    <div class="modal fade" id="myModal2" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data Biaya Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- isi form -->
                <div class="modal-body">
                    <input type="hidden" id="userId" class="form-control">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="bpp">Jumlah BPP</label>
                            <input type="text" class="form-control" id="bpp" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                        </div>
                        <div class="form-group">
                            <label for="asuransi">Jumlah Asuransi</label>
                            <input type="text" class="form-control" id="asuransi" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="total" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                        </div>
                </div>
                <!-- footer form -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="#" id="save" class="btn btn-primary">simpan</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit data -->

    <!-- double modal -->
    <script>
    $('#openBtn').click(function () {
        $('#myModal2').modal({
            show: true
        });
    })
    </script>

    <script src="js/bootstrap.js"></script>
    <script src="ajax/js/tambahBiaya.js"></script>
    <script src="ajax/js/cariBiaya.js"></script>
    <script src="ajax/js/deleteBiaya.js"></script>
    <script src="ajax/js/updateBiaya.js"></script>
</body>

</html>