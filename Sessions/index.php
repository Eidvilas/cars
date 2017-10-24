<?php
	
	session_start();

	

	


	if (isset($_POST['username'])){
		if ($_SESSION["username"]=="Edis") {

			if ($_SESSION["password"]=="slaptas") {
					$_SESSION["username"] = $_POST['username'];
					$_SESSION["admin"]	= true;
					$_SESSION["last_login"] = date("Y-m-d H:m:s");
			} else {
			 	echo "Wrong pass";
			}
		} elseif (isset($_POST['Logout'])) {
		session_destroy();
		$_SESSION = null;
	}
}



	
	print_r($_SESSION);
	// $_SESSIONS["drink"] = "Cofee";



	?>

	<html>
	<body>
		<form method="POST">
			<input type="text" name="username"><br>
			<input type="password" name="password"><br>
			<input type="submit" value="Login">
		</form>
		<form method="POST">
			<input type="submit" name="Logout" value="Logout">
		</form>

		<?php
		//if (isset($_SESSION('admin'))){
		//	echo "You're admin";
		//}



		?>


	</body>


	</html>