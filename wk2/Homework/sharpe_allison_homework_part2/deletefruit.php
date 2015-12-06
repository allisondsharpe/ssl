<?php

/**
 * Name: Allison Sharpe
 * Date: 12/2/15
 * Class: Server Side
 * Assignment: Fruit DB App
 */

//establish DB connection
$user = 'root';
$pass = 'root';
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

//use $_GET to confirm userid
$id = $_GET['id'];

//use prepare to delete userid
$stmt = $dbh->prepare("DELETE FROM fruits WHERE id IN (:id)");

$stmt->bindParam(':id', $id);
$stmt->execute(); //executes bindParam

header('location: fruits.php'); //directs to 'fruits.php'

?>

