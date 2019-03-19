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
$ambil = mysql_query("insert into jurusan (kode_jurusan,nama_jurusan,keterangan) values('$_POST[kode]','$_POST[nama]','$_POST[keterangan]')");

if($ambil){
header("location:index.php?p=jurusan");
}
}


if($_GET['proses']=='ubah'){
$ubah = mysql_query("update jurusan set 
kode_jurusan = '$_POST[kode]',
nama_jurusan = '$_POST[nama]',
keterangan = '$_POST[keterangan]' 
where kode_jurusan ='$_POST[kode]'");

if($ubah){
header("location:index.php?p=jurusan");
}
}

if($_GET['page']=='hapus'){
$hapus = mysql_query("delete from jurusan where kode_jurusan = '$_GET[kode]'");
if($hapus){
header("location:index.php?p=jurusan");
}
}
?>
<body>
</body>
</html>
<?php
ob_end_flush();

?>