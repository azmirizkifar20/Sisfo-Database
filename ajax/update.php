<?php
$koneksi = mysqli_connect('localhost' , 'root' ,'' ,'chevalier');

if(isset($_POST['id'])){
	
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$nilai = $_POST['nilai'];
	$id = $_POST['id'];

	//  query update data 
	$result  = mysqli_query($koneksi , "UPDATE mahasiswa SET nim='$nim' , nama='$nama' , kelas = '$kelas', nilai='$nilai' WHERE id='$id'");
	if($result){
		echo 'data updated';
	}

}
?>