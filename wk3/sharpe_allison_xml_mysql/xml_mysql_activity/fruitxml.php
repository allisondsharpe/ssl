<?php

/**
 * =====================
 * Name: Allison Sharpe
 * Date: 12-08-15
 * Class: SSL
 * Activity: XML with MySQL
 * =====================
 */

header("Content-type:text/xml"); //tells browser that file will be xml

$dbh = new PDO("mysql:host=localhost;dbname=ssl;port:8889","root","root"); //calling to database "SSL"
$db = "SELECT * FROM fruits order by id"; //selecting all rows and ordering by id
$stmt = $dbh->prepare($db); //selects all rows from table 'fruits'
$stmt->execute(); //executes prepare method
$return = $stmt->fetchAll(); //returns values for each row

$xmlfile = "<?xml version='1.0' encoding='UTF-8'?>"; //selecting version of xml

$xmlfile .= "<fruits>"; //opening parent 'fruits'
foreach($return as $fruit){ //foreach loop that will print 'fruitname' and fruitcolor' to browser
    $xmlfile .= "<fruit>"; //opening child tag 'fruit'
    $xmlfile .= "<name>".$fruit['fruitname']."</name>"; //printing 'fruitname'
    $xmlfile .= "<color>".$fruit['fruitcolor']."</color>"; //printing 'fruitcolor'
    $xmlfile .= "</fruit>"; //closing child tag 'fruit'
}
$xmlfile .= "</fruits>"; //closing parent tag 'fruits'
echo $xmlfile; //echo's $xmlfile to the browser

?>