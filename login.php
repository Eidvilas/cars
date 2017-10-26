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
        if (password_verify($_POST['password'], $user_data['password'])){
            //($_POST['password'] == $user_data['password'] && $_POST['password'] !== "") { 

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['level'] = $user_data['level'];
            $_SESSION['last_login'] = date("Y-m-d H:m:s");
            
            setcookie("sausainis_username", $user_data['username'], time() + (60*60*24*7), "/"); // 86400 = 1 day

            header("location: index.php");

        } else {
            echo "try again!";
        }
}



print_r($_SESSION);

if(isset($_COOKIE["sausainis_username"])) {
    echo "Cookie named " . $_COOKIE["sausainis_username"];
}

?>

<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
<body>
    
    
            



    <div class="container-fluid">    
        <div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <br>
                        <div class="input-group">
                        <input class="btn btn-info" type="submit" value="Login">&nbsp
                        <a class="btn btn-info" href="register.php" >Register</a>
                        </div>
                    </form>
                    
                </div> 
                <div class="col"></div>
            </div>
        </div>
    </div>        

</body>
</html>