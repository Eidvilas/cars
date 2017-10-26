<?php
session_start();
$errorMessage = '';
if(isset($_POST['username'])){
        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "cars";
            
            $userPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $userLevel = 3;
            
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO login (username, password, level)
                                    VALUES (:username, :password, :level)");
            $stmt->bindParam(':username', $_POST['username']);
            $stmt->bindParam(':password', $userPassword);
            $stmt->bindParam(':level', $userLevel);
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $errorMessage = "Vartotojas tokiu vardu jau egzistuoja";
            } else {
                $errorMessage = $e->getMessage();
            }
        }      
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="register.js"></script>
  
  </head>
  <body>
        <div class="container-fluid">
            <?php if (!empty($errorMessage)) :?>
            <div class="row">
                <div class="col alert alert-danger">
                    <?php echo $errorMessage; ?>
                </div>
            </div>
            <?php endif; ?>
                <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <form action="" method="POST" id="registerForm">
                                        <br>
                                        <h2>Register</h2>
                                        <div id="alert2"></div>
                                        <br>
                                        <div class="input-group">
                                            <input name="username" class="form-control form-control-sm" type="text" placeholder="Username">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <input id="pass" name="password" class="form-control form-control-sm" type="password" required="required" placeholder="Password">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <input id="pass2" class="form-control form-control-sm" type="password" required="required" placeholder="Repeat Password">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <input id="register" class="btn btn-warning btn-sm" type="submit" value="Register new user">
                                        </div>

                                </form>
                        </div>
                        <div class="col"></div>
                </div>
        </div>
      
  </body>
</html>