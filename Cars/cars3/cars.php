<?php
header ("Content-type:application/json");
if(isset($_POST['owner']) && $_POST['owner'] != "") {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "students";
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO cars (owner, license, model, make) VALUES (:owner, :license, :model, :make)");
        $stmt->bindParam(':owner', $_POST['owner']);
        $stmt->bindParam(':license', $_POST['license']);
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
////////  Show last entries
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "students";
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_GET['filt'])) {
        $stmt = $conn->query("SELECT * FROM cars ORDER BY date DESC LIMIT 3");
        $response['cars'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = $conn->query("SELECT * FROM cars");
        $response['cars'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    $conn = null;
} catch (PDOException $e) {
    $response['message'] = ['type' => 'danger','body' =>  $e->getMessage()];
}
//////// Filter by model
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "students";
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_GET['filter'])) {
        $stmt = $conn->query("SELECT * FROM cars WHERE model LIKE ".$_GET['filter']);
        $response['cars'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    $conn = null;
} catch (PDOException $e) {
    $response['message'] = ['type' => 'danger','body' =>  $e->getMessage()];
}
///////// Filter by owner
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "students";
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_GET['filtras'])) {
        $stmt = $conn->prepare("SELECT * FROM cars WHERE UPPER(owner) LIKE :filtras OR UPPER(license) LIKE :filtras");
        $s = "%" . strtoupper($_GET['filtras']) . "%";
        $stmt->bindParam(":filtras", $s);
        $stmt->execute();
        $response['cars'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    $conn = null;
} catch (PDOException $e) {
    $response['message'] = ['type' => 'danger','body' =>  $e->getMessage()];
}
echo json_encode($response);