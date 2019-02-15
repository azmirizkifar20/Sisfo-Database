<?php
$koneksi = mysqli_connect('localhost' , 'root' ,'' ,'chevalier');

if($_POST['id']){
    $id = $_POST['id'];
	$result  = mysqli_query($koneksi , "DELETE FROM mahasiswa WHERE id='$id'");
	return mysqli_affected_rows($koneksi);
}
?>