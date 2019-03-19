<?php
ob_start();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include("koneksi.php");
if($_GET['proses']=='input'){
$ambil = mysql_query("insert into prodi (kode_prodi,nama_prodi,keterangan, kode_jurusan) values('$_POST[kode]','$_POST[nama]','$_POST[keterangan]','$_POST[jurusan]')");

if($ambil){
header("location:index.php?p=prodi");
}
}


if($_GET['proses']=='ubah'){
$ubah = mysql_query("update prodi set 
nama_prodi = '$_POST[nama]',
keterangan = '$_POST[keterangan]',
kode_jurusan = '$_POST[jurusan]' 
where kode_prodi ='$_POST[kode]'");

if($ubah){
header("location:index.php?p=prodi");
}
}

if($_GET['page']=='hapus'){
$hapus = mysql_query("delete from prodi where kode_prodi = '$_GET[kode]'");
if($hapus){
header("location:index.php?p=prodi");
}
}
?>
<body>
</body>
</html>
<?php
ob_end_flush();

?>