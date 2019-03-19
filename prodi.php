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
<h1>DATA PRODI</h1>
<a href="index.php?p=prodi&page=input"  class="btn btn-info">Tambah Data Prodi </a>
<table width="50%" class="table table-hover">
  <tr>
    <td>NO</td>
    <td>Kode Prodi</td>
    <td>Nama Prodi</td>
    <td>Keterangan</td>
	<td>Kode Jurusan</td>
    <td>AKSI</td>
  </tr>
  <?php
 
  
  $no = 1;
  $ambil = mysql_query("select * from prodi");
  while($data = mysql_fetch_array($ambil)){

  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php  echo $data[0];?></td>
    <td><?php  echo $data[1];?></td>
	
	<td><?php 			
				echo $data[2];
	
	?></td>
    <td><?php  echo $data[3];?></td>
    <td><a href="aksi_prodi.php?page=hapus&kode=<?php echo $data[0]; ?>" onclick="return confirm ('Yakin Ingin Hapus Data')" class="btn btn-danger"> HAPUS</a> | <a href="?p=prodi&page=edit&kode=<?php echo $data[0]; ?>"  class="btn btn-warning"> EDIT </a></td>
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
<h1 align="center">INPUT DATA PRODI</h1>
<form id="form1" name="form1" method="post" action="aksi_prodi.php?proses=input">
  <table width="50%" class="table table-condensed" align="center">
    <tr>
      <td>Kode Prodi</td>
      <td><label>
        <input type="text" name="kode"/>
      </label></td>
    </tr>
    <tr>
      <td>Nama Prodi</td>
      <td><label>
        <input type="text" name="nama" />
      </label></td>
    </tr>
    
    <tr>
      <td>Keterangan</td>
      <td><label>
      <textarea name="keterangan"></textarea>
      </label></td>
	   <tr>
      <td>Kode Jurusan</td>
      <td><select name="jurusan"><?php $query = mysql_query("select * from jurusan"); 
				while($data = mysql_fetch_array($query)){
				
				
	
	?>
    <option value="<?php echo $data[0];?>"><?php echo $data[0];?></option><?php }?>
  </select></td>
    </tr>
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


$ambil = mysql_query("select * from prodi where kode_prodi='$_GET[kode]'");
$data = mysql_fetch_array($ambil);

?>
<form id="form1" name="form1" method="post" action="aksi_prodi.php?proses=ubah">
  <table width="50%" class="table table-condensed" border="0">
    <tr>
      <td>Kode Prodi</td>
      <td><label>
        <input type="text" value="<?php echo $data[0]; ?>" name="kode"  readonly=""/>
      </label></td>
    </tr>
    <tr>
      <td>Nama Prodi</td>
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
	 <tr>
      <td>Kode Jurusan</td>
      <td><label>
        <input type="text" value="<?php echo $data[3]; ?>" name="jurusan" />
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
