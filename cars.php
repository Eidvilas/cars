<?php
header("Content-type:application/json");
try {
    $conn = new PDO("mysql:host=localhost;dbname=cars;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['owner']) && ($_POST['owner'] != "")) {
    
        $statement = $conn->prepare("INSERT INTO models (owner, license, make, model) VALUES (:owner, :license, :make, :model)");
        $statement->execute($_POST);
        $response['message'] = ['type' => 'success','body' => 'Car was added'];
    } elseif(isset($_GET['search'])) {
        $statement = $conn->prepare("SELECT * FROM models WHERE UPPER(owner) LIKE :search OR UPPER(license) LIKE :search");
        $s = "%" . strtoupper($_GET['search']) . "%";
        $statement->bindParam(":search", $s);
        $statement->execute();
        $response['models'] = $statement->fetchAll(PDO::FETCH_ASSOC);
        
    } elseif(isset($_GET['last'])) {
        $statement = $conn->prepare("SELECT * FROM models ORDER BY id DESC LIMIT 5");
        $statement->execute();
        $response['models'] = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $statement = $conn->prepare("SELECT * FROM models");
        $statement->execute();
        $response['models'] = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $conn = null;
} catch(PDOException $e) {
    $response['message'] = ['type' => 'danger','body' => $e->getMessage()];
}
echo json_encode($response);