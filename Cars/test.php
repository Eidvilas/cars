 <?php


 if(password_verify($_POST['password'], $user_data['password'])) { 

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['level'] = $user_data['level'];
            $_SESSION['last_login'] = date("Y-m-d H:m:s");
            
            setcookie("sausainis_username", $user_data['username'], time() + (60*60*24*7), "/"); // 86400 = 1 day

            header("location: index.php");

        } else {
            echo "try again!";
        }



        <?php
session_start();
if(isset($_POST['username'])){
        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "cars";
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM login WHERE username = :username");
            $stmt->bindParam(':username', $_POST['username']);
            $stmt->execute();
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $user_created = ture;


       
}

?>

<html>

  <body>
  		<div class="container-fluid">
  			<div class="row">
  				<div class="col"></div>
  				<div class="col">
  					<br>
	    			<h2>Register</h2>
	                <div id="alert2"></div>
	                <br>
	                <div class="input-group">
	                    <input id="username" class="form-control form-control-sm" type="text" placeholder="Username">
	                </div>
	                <br>
	                <div class="input-group">
	                    <input id="password" class="form-control form-control-sm" type="text" placeholder="Password">
	                </div>
	                <br>
	                <div class="input-group">
	                    <input id="password_repeat" class="form-control form-control-sm" type="email" placeholder="Repeat Password">
	                </div>
	                <br>
	                <div class="input-group">
	                    <input id="register" class="btn btn-warning btn-sm" type="button" value="Register new user">
	                </div>
            	</div>
	            <div class="col"></div>
            </div>
        </div>
  </body>
</html>