<?php
 $p = isset($_GET['p']) ? $_GET['p'] : 'home';
							  if($p){
							  
							  include 'home.php';
							  }
							  if($p=='mahasiswa'){
							  
							  include 'mahasiswa.php';
							  }
							  if($p=='jurusan'){
							  
							  include 'jurusan.php';
							  }
							   if($p=='prodi'){
							  
							  include 'prodi.php';
							  }
							  

?>