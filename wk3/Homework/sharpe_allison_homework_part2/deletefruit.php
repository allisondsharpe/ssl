<?php

/**
 * Name: Allison Sharpe
 * Date: 12/09/15
 * Class: Server Side Languages
 * Assignment: Fruit Ads API
 */

//defining variables for $user and $pass
$user = 'root';
$pass = 'root';
//calling to database 'ssl'
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

//use $_GET to confirm id
$id = $_GET['id'];

//use prepare to gather values for $id
$stmt = $dbh->prepare("DELETE FROM fruits WHERE id IN (:id)");

//binding values for $id using 'bindParam()'
$stmt->bindParam(':id', $id);
$stmt->execute(); //executes bindParam

header('location: ads.php'); //re-directs to 'ads.php'

?>

