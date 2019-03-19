<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include("koneksi.php");
$p=isset($_GET['page'])? $_GET['page'] : 'tampil'; //ternary
switch($p){
case 'tampil':
?>
<h1>DATA JURUSAN</h1>
<a href="indeks.php?p=jurusan&page=input"  class="btn btn-info">Tambah Data Jurusan </a>
<table width="50%" class="table table-hover">
  <tr>
    <td>NO</td>
    <td>Kode Jurusan</td>
    <td>Nama Jurusan</td>
    <td>Keterangan</td>
    <td>AKSI</td>
  </tr>
  <?php
 
  
  $no = 1;
  $ambil = mysql_query("select * from jurusan");
  while($data = mysql_fetch_array($ambil)){

  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php  echo $data[0];?></td>
    <td><?php  echo $data[1];?></td>
    <td><?php  echo $data[2];?></td>
    <td><a href="aksi_jurusan.php?page=hapus&kode=<?php echo $data[0]; ?>" onclick="return confirm ('Yakin Ingin Hapus Data')" class="btn btn-danger"> HAPUS</a> | <a href="?p=jurusan&page=edit&kode=<?php echo $data[0]; ?>"  class="btn btn-warning"> EDIT </a></td>
  </tr>
  <?php
  $no++;
  }
  ?>
</table>

<?php
break;
case 'input':
?>
<h1 align="center">INPUT DATA JURUSAN</h1>
<form id="form1" name="form1" method="post" action="aksi_jurusan.php?proses=input">
  <table width="50%" class="table table-condensed" align="center">
    <tr>
      <td>Kode Jurusan</td>
      <td><label>
        <input type="text" name="kode" />
      </label></td>
    </tr>
    <tr>
      <td>Nama Jurusan</td>
      <td><label>
        <input type="text" name="nama" />
      </label></td>
    </tr>
    
    <tr>
      <td>Keterangan</td>
      <td><label>
      <textarea name="keterangan"></textarea>
      </label></td>
    </tr>
	<td>
	 </td>
	 <td>
	 <input name="ok" type="submit"   id="ok" value="OK" /> </td>
  </table>
  <p>
    <label>
    
    </label>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<?php
break;
case 'edit':


$ambil = mysql_query("select * from jurusan where kode_jurusan='$_GET[kode]'");
$data = mysql_fetch_array($ambil);

?>
<form id="form1" name="form1" method="post" action="aksi_jurusan.php?proses=ubah">
  <table width="50%" class="table table-condensed" border="0">
    <tr>
      <td>Kode Jurusan</td>
      <td><label>
        <input type="text" value="<?php echo $data[0]; ?>" name="kode"  />
      </label></td>
    </tr>
    <tr>
      <td>Nama Jurusan</td>
      <td><label>
        <input type="text" value="<?php echo $data[1]; ?>" name="nama" />
      </label></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td><label>
        <textarea name="keterangan"><?php echo $data[2]; ?></textarea>
      </label></td>
    </tr>
  </table>
  <p>
    <label>
    <input name="ok" type="submit" id="ok" value="OK"  />
    </label>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<?php
break;


}

?>
<body>
</body>
</html>
