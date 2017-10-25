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
        if(password_verify($_POST['password'], $user_data['password'])) { 

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
<body>
    



    <div class="container-fluid">    
        <div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <form action="" method="POST">
                        
                        <input type="text" name="username"><br>
                        <input type="password" name="password"><br>
                        <input type="submit" value="login">

                    </form>
                    <a class="btn btn-info" href="register.php" >Register</a>
                </div> 
                <div class="col"></div>
            </div>
        </div>
    </div>        

</body>
</html>