<?php

/**
 * Name: Allison Sharpe
 * Date: 12/09/15
 * Class: Server Side Languages
 * Assignment: Fruit Ads API
 */

header("Content-type:application/json"); //tells browser that this file will be json

$user ="root"; //defining variables for $user and $pass
$pass ="root";
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass); //calling to database "ssl"

//selecting variables from table 'fruits'
//'RAND() LIMIT 1' limits the amount of rows displayed in browser by random
$db = ("SELECT fruitname, fruitcolor, fruitimage FROM fruits order by RAND() LIMIT 1");
$stmt = $dbh->prepare($db); //using 'prepare' to select values from table 'fruits'
$stmt->execute(); //executes $stmt
$return = $stmt->fetchAll(); //using 'fetchAll()' to return values from $stmt
$encoded_json = json_encode($return); //'json_encode' converts file to json format

echo $encoded_json; //echoes $encoded_json to browser