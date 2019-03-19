<?php
	include 'koneksi.php';
	
	$result= mysql_query("select * from prodi where kode_jurusan='$_GET[kodejurusan]'");
	
	while($data= mysql_fetch_array($result)){
	?>
	<option value="<?php echo $data[0]?>"><?php echo $data[1]?>"</option>
	<?
	}
	?>
?>

