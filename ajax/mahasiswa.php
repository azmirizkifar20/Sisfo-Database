<?php 
    require '../function/functions.php';
    
    // pagination
    $jumlahDataPerHalaman = 6;
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

    if ( isset($_POST["cari"]) ) {
        $mahasiswa = cari($_POST["keyword"]);
    }

    $keyword = $_GET["keyword"];
    
    $query = "SELECT * FROM  mahasiswa WHERE 
    nama LIKE '%$keyword%' OR
    nim LIKE '%$keyword%' OR
    kelas LIKE '%$keyword%' OR
    nilai LIKE '%$keyword%'";;
    $mahasiswa = query($query);
?>


<div class="row">
    <div class="col-md-12">
        <table class="table table-sm table-hover table-striped table-bordered">
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>IPK</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
            <tr class="show" id="<?= $row["id"]; ?>">
                <td>
                    <?= $i; ?>
                </td>
                <td data-target="nim"><?= $row["nim"]; ?></td>
                <td data-target="nama"><?= $row["nama"]; ?></td>
                <td data-target="kelas"><?= $row["kelas"]; ?></td>
                <td data-target="nilai"><?= $row["nilai"]; ?></td>
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
                    <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                </li>
                <?php else : ?>
                <li class="page-item" aria-current="page">
                    <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
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
<form action="export/excel.php" method="post">
    <button type="submit" name="excel" class="btn btn-success export float-left"><i class="far fa-file-excel"></i>
        save to excel</button>
</form>
<form action="export/pdf.php" method="post">
    <button type="submit" name="pdf" class="btn btn-danger export pdf"><i class="far fa-file-pdf"></i> save
        to PDF</button>
</form>
<!-- export -->
</div>
<script src="ajax/js/delete.js"></script>