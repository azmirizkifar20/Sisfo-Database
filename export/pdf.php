<?php 
function fetchData()
{
     $output = '';
     require '../function/functions.php';
     $sql = "SELECT * FROM mahasiswa ORDER BY id ASC";
     $result = mysqli_query($koneksi, $sql);
     $no = 1;

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
     return $output;
}

if (isset($_POST["pdf"])) {
     require_once('../tcpdf/tcpdf.php');
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $obj_pdf->SetCreator(PDF_CREATOR);
     $obj_pdf->SetTitle("Data Mahasiswa D3 Rekayasa Perangkat Lunak Aplikasi");
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
<h4 align="center">Data Mahasiswa D3 Rekayasa Perangkat Lunak Aplikasi</h4><br/> 
<table border="1" cellspacing="0" cellpadding="3">  
     <tr>  
          <th width="5%">No.</th>   
          <th width="20%">NIM</th>
          <th width="40%">Nama</th>
          <th width="20%">Kelas</th>
          <th width="15%">IPK</th>
     </tr>  
';
     $content .= fetchData();
     $content .= '</table>';
     $obj_pdf->writeHTML($content);
     $obj_pdf->Output('Data Mahasiswa.pdf', 'I');
}
?>