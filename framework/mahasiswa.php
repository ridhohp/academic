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
<h1>DATA MAHASISWA</h1>
<a href="indeks.php?p=mahasiswa&page=input"  class="btn btn-info">Tambah Data Mahasiswa </a>
<table width="50%" class="table table-hover">
  <tr>
    <td>NO</td>
    <td>NIM</td>
    <td>Nama</td>
    <td>Kelas</td>
    <td>Jurusan</td>
    <td>Prodi</td>
    <td>Telepon</td>
    <td>Alamat</td>
    <td>Asal Sekolah </td>
    <td>AKSI</td>
  </tr>
  <?php
 
  
  $no = 1;
  $ambil = mysql_query("select * from mahasiswa");
  while($data = mysql_fetch_array($ambil)){

  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php  echo $data[0];?></td>
    <td><?php  echo $data[1];?></td>
    <td><?php  echo $data[2];?></td>
    <td><?php  echo $data[3];?></td>
    <td><?php  echo $data[4];?></td>
    <td><?php  echo $data[5];?></td>
    <td><?php  echo $data[6];?></td>
    <td><?php  echo $data[7];?></td>
    <td><a href="aksi_mahasiswa.php?page=hapus&id=<?php echo $data[0]; ?>" onclick="return confirm ('Yakin Ingin Hapus Data')" class="btn btn-danger"> HAPUS</a> | <a href="indeks.php?p=mahasiswa&page=edit&id=<?php echo $data[0]; ?>"  class="btn btn-warning"> EDIT </a></td>
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
<h1 align="center">INPUT DATA MAHASISWA</h1>
<form id="form1" name="form1" method="post" action="aksi_mahasiswa.php?proses=input">
  <table width="50%" class="table table-condensed" align="center">
    <tr>
      <td>NIM</td>
      <td><label>
        <input type="text" name="nim" />
      </label></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><label>
        <input type="text" name="nama" />
      </label></td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td><label>
        <input type="text" name="kelas" />
      </label></td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td><label>
        <input type="text" name="jurusan" />
      </label></td>
    </tr>
    <tr>
      <td>Prodi</td>
      <td><label>
        <input type="text" name="prodi" />
      </label></td>
    </tr>
    <tr>
      <td>Telp</td>
      <td><label>
        <input type="text" name="telp" />
      </label></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><label>
      <textarea name="alamat"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>Sekolah Asal </td>
      <td><label>
        <input type="text" name="sekolah_asal" />
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


$ambil = mysql_query("select * from mahasiswa where nim='$_GET[id]'");
$data = mysql_fetch_array($ambil);

?>
<form id="form1" name="form1" method="post" action="aksi_mahasiswa.php?proses=ubah">
  <table width="50%" border="1">
    <tr>
      <td>NIM</td>
      <td><label>
        <input type="text" value="<?php echo $data[0]; ?>" name="nim"  />
      </label></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><label>
        <input type="text" value="<?php echo $data[1]; ?>" name="nama" />
      </label></td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td><label>
        <input type="text" value="<?php echo $data[2]; ?>" name="kelas" />
      </label></td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td><label>
        <input type="text" value="<?php echo $data[3]; ?>" name="jurusan" />
      </label></td>
    </tr>
    <tr>
      <td>Prodi</td>
      <td><label>
        <input type="text" value="<?php echo $data[4]; ?>" name="prodi" />
      </label></td>
    </tr>
    <tr>
      <td>Telp</td>
      <td><label>
        <input type="text" value="<?php echo $data[5]; ?>" name="telp" />
      </label></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><label>
        <textarea name="alamat"><?php echo $data[6]; ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td>Sekolah Asal </td>
      <td><label>
        <input type="text" value="<?php echo $data[7]; ?>" name="sekolah_asal" />
      </label></td>
    </tr>
  </table>
  <p>
    <label>
    <input name="ok" type="submit" id="ok" value="OK" />
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
