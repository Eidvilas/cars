<?php
// we always return JSON document
header("Content-type:application/json");
// if posting new user, we return status
if(isset($_POST['name']) && $_POST['name'] != "") {
	try {
	    $conn = new PDO("mysql:host=localhost;dbname=cars;charset=utf8", "root", "");
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $statement = $conn->prepare("INSERT INTO users (owner, licence, model, make, entry)
	    	VALUES (:owner, :surname, :email, :phone)");
	   	
	   $statement->bindParam(':owner', htmlspecialchars($_POST['owner']));
	   $statement->bindParam(':licence', htmlspecialchars($_POST['licence']));
	   $statement->bindParam(':model', htmlspecialchars($_POST['model']));
	   $statement->bindParam(':make', htmlspecialchars($_POST['make']));
	   $statement->bindParam(':entry', htmlspecialchars($_POST['entry']));
	   $statement->execute();
	  $conn = null;
	  $response['message'] = ['type' => 'success','body' => 'Car was added'];
	} catch(PDOException $e) {
	    $response['message'] = ['type' => 'danger','body' => $e->getMessage()];
	}
} else {
	$response['message'] = ['type' => 'warning','body' => 'No cars data to submit'];
}
try {
    $conn = new PDO("mysql:host=localhost;dbname=cars;charset=utf8", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_GET['filter'])) { // SELECT * FROM users WHERE id > 50 
	    // if trying to filter resulsts
    	$statement = $conn->query("SELECT * FROM cars WHERE id >" . $_GET['filter']);
    	$response['users'] = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
	    // if not filtering
    	$statement = $conn->query("SELECT * FROM cars");
    	$response['users'] = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    $conn = null;
  
} catch(PDOException $e) {
    $response['message'] = ['type' => 'danger','body' =>  $e->getMessage()];
}
// encode array to JSON and display
echo json_encode($response);