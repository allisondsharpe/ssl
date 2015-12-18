<?php

/**
 * Name: Allison Sharpe
 * Date: 12/14/15
 * Class: Server Side Languages
 * Assignment: Homework/Wk4
 */

session_start();
$_SESSION['message'] = "<div class='msg'><h4> You have successfully deleted a contact! </h4></div>"; //will alert user after they've deleted a contact

$user = "root";
$pass = "root";
$db = 'mysql:host=localhost;dbname=ssl;port=8889'; //calling to database 'ssl'
$dbh = new PDO($db, $user, $pass);

$contactid = $_GET['id']; //using '$_GET' to gather values for 'id'
$stmt = $dbh->prepare("DELETE FROM contacts WHERE id = :id"); //using 'prepare' to select values from table 'contacts' and delete by 'id'
$stmt->bindParam(':id', $contactid); //using 'bindParam()' to bind all values for 'id' with $contactid
$stmt->execute();
header('Location: contacts.php'); //will re-direct browser back to 'contacts.php'
die();




?>