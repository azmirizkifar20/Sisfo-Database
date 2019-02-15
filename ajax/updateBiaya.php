<?php
$koneksi = mysqli_connect('localhost' , 'root' ,'' ,'chevalier');

if(isset($_POST['id'])){
	
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$bpp = $_POST['bpp'];
	$asuransi = $_POST['asuransi'];
	$id = $_POST['id'];

	//  query update data 
	$result  = mysqli_query($koneksi , "UPDATE biaya SET nim='$nim' , nama='$nama' , bpp = '$bpp', asuransi='$asuransi' WHERE id='$id'");
	if($result){
		echo 'data updated';
	}

}
?>