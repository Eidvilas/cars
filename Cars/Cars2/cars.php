<?php
header ("Content-type:application/json");
if(isset($_POST['owner']) && $_POST['owner'] != "") {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cars";
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO models (owner, licence, model, make) VALUES (:owner, :licence, :model, :make)");
        $stmt->bindParam(':owner', $_POST['owner']);
        $stmt->bindParam(':licence', $_POST['licence']);
        $stmt->bindParam(':model', $_POST['model']);
        $stmt->bindParam(':make', $_POST['make']);
        $stmt->execute();
        $conn = null;
        $response['message'] = ['type' => 'success', 'body'=>'New record created successfully'];
    } catch (PDOException $e) {
        $response['message'] = ['type' => 'danger','body' => $e->getMessage()];
    }
} else {
    $response['message'] = ['type' => 'warning','body' => 'No user data to submit'];
}




    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cars";
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_GET['paskutiniai'])) {
            $stmt = $conn->query("
            	
            	SELECT * FROM models ORDER by id DESC LIMIT 5
            	

            ");
            $response['models'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $stmt = $conn->query("SELECT * FROM models");
            $response['models'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $conn = null;
    } catch (PDOException $e) {
        $response['message'] = ['type' => 'danger','body' =>  $e->getMessage()];
    }

    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cars";
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_GET['filter'])) {
            $stmt = $conn->query("
            	
            	SELECT model
				FROM models
				WHERE columnN LIKE %or%;

            ");
            $response['models'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $stmt = $conn->query("SELECT * FROM models");
            $response['models'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $conn = null;
    } catch (PDOException $e) {
        $response['message'] = ['type' => 'danger','body' =>  $e->getMessage()];
    }


    echo json_encode($response);