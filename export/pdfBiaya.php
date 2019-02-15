<?php 
function fetchData()
{
    $output = '';
    require '../function/functions.php';
    $sql = "SELECT * FROM biaya ORDER BY id ASC";
    $result = mysqli_query($koneksi, $sql);
    $no = 1;
    
    while ($row = mysqli_fetch_assoc($result)) {
        // masukin nilai ke variabel
        $bppnya = $row["bpp"];
        $asuransinya = $row["asuransi"];
        // konversi string nilai ke int + split
        $duitBpp = str_replace('.', '', $bppnya);
        $duitAsuransi = str_replace('.', '', $asuransinya);
    
        $total = $duitBpp + $duitAsuransi;
        $hasilAkhir = number_format ($total, 0, ',', '.');
        $output .= '
        <tr>
            <td>' . $no . '</td>
            <td>' . $row["nim"] . '</td>
            <td>' . $row["nama"] . '</td>
            <td>' . $row["bpp"] . '</td>
            <td>' . $row["asuransi"] . '</td>
            <td>' . $hasilAkhir . '</td>
        </tr>
    ';
        $no++;
    }
    return $output;
}

if (isset($_POST["pdf"])) {
    require_once('../tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Data Biaya Semester Mahasiswa D3 RPLA");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(true, 10);
    $obj_pdf->SetFont('helvetica', '', 11);
    $obj_pdf->AddPage();
    $content = '';
    $content .= '  
<h4 align="center">Data Biaya Semester Mahasiswa D3 RPLA</h4><br/> 
<table border="1" cellspacing="0" cellpadding="3">  
    <tr>  
        <th width="5%">No.</th>   
        <th width="15%">NIM</th>
        <th width="35%">Nama</th>
        <th width="15%">BPP</th>
        <th width="15%">Asuransi</th>
        <th width="15%">Total</th>
    </tr>  
';
    $content .= fetchData();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('Data Biaya Semester Mahasiswa.pdf', 'I');
}
?>