<?php 
// koneksi ke databse
require '../function/functions.php';

$output = '';
if (isset($_POST['excel'])) {
    $sql = "SELECT * FROM mahasiswa ORDER BY id";
    $result = mysqli_query($koneksi, $sql);
    $no = 1;

    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" border="1" cellspacing="0" cellpadding="3">
                <tr>
                    <th>No.</th>   
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>IPK</th>
                </tr>
        ';
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '
            <tr>
                <td>' . $no . '</td>
                <td>' . $row["nim"] . '</td>
                <td>' . $row["nama"] . '</td>
                <td>' . $row["kelas"] . '</td>
                <td>' . $row["nilai"] . '</td>
            </tr>
            ';
            $no++;
        }
        $output .= '</table>';
        header("Content-Type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
        echo $output;
    }
}

?>