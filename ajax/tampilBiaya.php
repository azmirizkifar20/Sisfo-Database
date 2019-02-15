<?php 
// koneksi ke databse
require '../function/functions.php';

$mahasiswa = query("SELECT * FROM biaya");
?>

<div class="col-md-12">
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
            <td>
                <?= $i; ?>
            </td>
            <td data-target="nim"><?= $row["nim"]; ?></td>
            <td data-target="nama"><?= $row["nama"]; ?></td>
            <td data-target="bpp"><?php
                    $bppnya = $row["bpp"];
                    // konversi string nilai ke int + split
                    $duitBpp = str_replace('.', '', $bppnya);
                    $hasilBpp = number_format($duitBpp, 2, ',', '.');
                    echo "$hasilBpp"
                ?></td>
            <td data-target="asuransi"><?php 
                    $asuransinya = $row["asuransi"];
                    // konversi string nilai ke int + split
                    $duitAsuransi = str_replace('.', '', $asuransinya);
                    $hasilAsuransi = number_format($duitAsuransi, 2, ',', '.');
                    echo "$hasilAsuransi"
                ?></td>
            <td>
                <?php
                    // masukin nilai ke variabel
                    $bppnya = $row["bpp"];
                    $asuransinya = $row["asuransi"];
                    // konversi string nilai ke int + split
                    $duitBpp = str_replace('.', '', $bppnya);
                    $duitAsuransi = str_replace('.', '', $asuransinya);

                    $total = $duitBpp + $duitAsuransi;
                    $hasilAkhir = number_format($total, 2, ',', '.');

                    echo "$hasilAkhir"
                ?>
            </td>
            <td>
                <a href="#" id="<?= $row["id"] ;?>" class="btn btn-info delete"><i class="fas fa-trash-alt"></i></a>
                <a href="#" data-role="update" data-id="<?= $row["id"] ;?>" class="btn btn-outline-secondary" id="openBtn"><i class="fas fa-edit"></i></a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</div>
<script src="ajax/js/deleteBiaya.js"></script>