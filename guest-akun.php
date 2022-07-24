<?php 
  require 'connection.php';
  checkLoginAtLogin();

  if (isset($_POST['btnLogin'])) {
  	$username = htmlspecialchars($_POST['username']);
  	$password = htmlspecialchars($_POST['password']);

  	$checkUsername = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  	if ($data = mysqli_fetch_assoc($checkUsername)) {
  		if (password_verify($password, $data['password'])) {
  			$_SESSION = [
  				'id_user' => $data['id_user'],
  				'username' => $data['username'],
  				'id_jabatan' => $data['id_jabatan']
  			];
  			header("Location: index.php");
  		} else {
			setAlert("Password your insert is false!", "Check your Password BACK!", "error");
			header("Location: login.php");
	  	}
  	} else {
		setAlert("Username is not registered!", "Check your Username BACK!", "error");
		header("Location: login.php");
  	}
  }
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'include/css.php'; ?>
  <title>Login</title>
  <style>
	* {
	    margin: 0;
	    padding: 0;
	    box-sizing: border-box;
	}

  	body {
	    background-size: cover;
	    background-repeat: no-repeat;
	    background-image: url(assets/img/img_properties/lofi_generator.png);
	}
	
  	.container {
	    position: absolute;
	    left: 50%;
	    top: 50%;
	    transform: translate(-50%, -55%);
	}
</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 mx-5 py-4 px-5 text-dark rounded border border-dark" style="background-color: rgba(180,190,196,.6);">
				<h3 class="text-center">guest akun</h3>
				<h5 class="text-center">username : guest <br>
            password: guest123</h5>
            </div>
		</div>
	</div>

	<footer style="position: absolute; bottom: 0; width: 100%; text-align: center;">
		<div style="background-color: transparent;" class="container-fluid mt-5">
			<div class="row justify-content-center">
				<div class="col-lg text-center text-white pt-4 pb-2">
					<p>&copy; Copyright 2022. By allif.izz. All Right Reserved.</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>