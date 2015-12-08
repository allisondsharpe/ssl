<?php

/**
 * =====================
 * Name: Allison Sharpe
 * Date: 12-08-15
 * Class: SSL
 * Activity: JSON & MySQL
 * =====================
 */

header("Content-type:application/json"); //tells browser this is a json file

$dbh = new PDO("mysql:host=localhost;dbname=ssl;port:8889","root","root"); //calling to the database "SSL"
$db = "SELECT * FROM fruits order by id"; //selecting fruitname, fruitcolor, and ordering by id
$stmt = $dbh->prepare($db); //selects all rows from table 'fruits'
$stmt->execute(); //executes prepare method
$return = $stmt->fetchAll(); //returns values for each row
$jsonfile = json_encode($return); //encode converts file to json format

echo $jsonfile; //echo's out $result to the browser

?>