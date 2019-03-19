<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="file:///K|/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputUser" class="form-control" placeholder="Username" name="user" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      </form>
	  <?php
	  	if(isset($_POST['submit']))
		{
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			echo "username = ".$user." "."<br>"."password = ".$pass;	
			
			include "koneksi.php";
			$login = mysql_query("SELECT * from login where username='$user' AND password='$pass'");
			$cek = mysql_num_rows($login);
			
			if($cek){
				$data=mysql_fetch_array($login);
				echo $data['username']."".$data['level'];
				session_start();
				$_SESSION ['user'] = $data['username'];
				$_SESSION ['level'] = $data['level'];
				header ("location:index.php");
					}
			else {
				echo "<br>"."username dan password anda salah";
				}
			
		}
		?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="file:///K|/assets/js/ie10-viewport-bug-workaround.js"></script>
	
	
  </body>
</html>
