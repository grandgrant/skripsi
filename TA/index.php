<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Custom Authentication System</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- <div class="navbar-header"> -->
				<p>Otentikasi System Berbasis Informasi Perangkat</p>
			<!-- </div> -->
		</div>
	</nav>

	<div class="mainpage">
		<div class="container">
			<div class="row">
				<div class="col-md-2 side-sector">
					<p>.col-md-3</p>
				</div>
				<div class="col-md-8 main-sector">
					<form action="coba.php" method="post">
						<div class="form-group">
							<label for="InputUsername">Email address</label>
							<input type="text" class="form-control" id="user" placeholder="Masukkan Username" name="username">
						</div>
						<div class="form-group">
							<label for="InputPassword">Password</label>
							<input type="password" class="form-control" id="userpassword" placeholder="Masukkkan Password" name="password">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>

					<a href="formdaftar.php">Daftar Akun</a>
				</div>
				<div class="col-md-2 side-sector">
					<p>.col-md-3</p>
				</div>
			</div>
				
			
		</div>
	</div>


	<div class="bottompage">
		<div class="container">
			<div class="row">
				<p>This system created by Aprihadi Perdana</p>
				<p>Powered by Bootstrap 3</p>
			</div>
				
		</div>
		
	</div>

	 
	
			
			










    <script scr="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>