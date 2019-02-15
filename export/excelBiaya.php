<?php 
// koneksi ke databse
require '../function/functions.php';

$output = '';
if (isset($_POST['excel'])) {
    $sql = "SELECT * FROM biaya ORDER BY id";
    $result = mysqli_query($koneksi, $sql);
    $no = 1;

    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" border="1" cellspacing="0" cellpadding="3">
                <tr>
                    <th>No.</th>   
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>BPP</th>
                    <th>Asuransi</th>
                    <th>Total</th>
                </tr>
        ';
        while ($row = mysqli_fetch_assoc($result)) {
            // masukin nilai ke variabel
            $bppnya = $row["bpp"];
            $asuransinya = $row["asuransi"];
            // konversi string nilai ke int + split
            $duitBpp = str_replace('.', '', $bppnya);
            $duitAsuransi = str_replace('.', '', $asuransinya);
        
            $total = $duitBpp + $duitAsuransi;
            $hasilAkhir = number_format ($total, 2, ',', '.');
            $hasilAsuransi = number_format ($duitAsuransi, 2, ',', '.');
            $hasilBpp = number_format ($duitBpp, 2, ',', '.');
            $output .= '
            <tr>
                <td>' . $no . '</td>
                <td>' . $row["nim"] . '</td>
                <td>' . $row["nama"] . '</td>
                <td>' . $hasilBpp . '</td>
                <td>' . $hasilAsuransi . '</td>
                <td>' . $hasilAkhir . '</td>
            </tr>
            ';
            $no++;
        }
        $output .= '</table>';
        header("Content-Type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Biaya Semester Mahasiswa.xls");
        echo $output;
    }
}

?>