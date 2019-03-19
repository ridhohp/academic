<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include("koneksi.php");
if($_GET['proses']=='input'){
$ambil = mysql_query("insert into mahasiswa (nim,nama,kelas,jurusan,prodi,telp,alamat,sekolah_asal) values('$_POST[nim]','$_POST[nama]','$_POST[kelas]','$_POST[jurusan]','$_POST[prodi]','$_POST[telp]','$_POST[alamat]','$_POST[sekolah_asal]')");

if($ambil){
header("location:indeks.php?p=mahasiswa");
}
}


if($_GET['proses']=='ubah'){
$ubah = mysql_query("update mahasiswa set 
nama = '$_POST[nama]',
kelas = '$_POST[kelas]',
jurusan = '$_POST[jurusan]',
prodi = '$_POST[prodi]',
telp = '$_POST[telp]',
alamat = '$_POST[alamat]',
sekolah_asal = '$_POST[sekolah_asal]' where nim ='$_POST[nim]'");

if($ubah){
header("location:indeks.php?p=mahasiswa");
}
}

if($_GET['page']=='hapus'){
$hapus = mysql_query("delete from mahasiswa where nim = '$_GET[id]'");
if($hapus){
header("location:indeks.php?p=mahasiswa");
}
}
?>
<body>
</body>
</html>
