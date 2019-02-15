<?php 
// koneksi ke databse
require '../function/functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
?>

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
<script src="ajax/js/delete.js"></script>