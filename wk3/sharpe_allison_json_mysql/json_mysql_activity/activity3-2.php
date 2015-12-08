<?php

/**
 * =====================
 * Name: Allison Sharpe
 * Date: 12-08-15
 * Class: SSL
 * Activity: JSON & MySQL
 * =====================
 */

$contents = file_get_contents("http://localhost:8888/SSL/Week3/activities/json_mysql_activity/fruitjson.php"); //getting contents from 'fruitjson.php'
$jsonfile = json_decode($contents); //decode converts json file to array

foreach($jsonfile as $fruit){ //using foreach loop to print 'fruitname' and 'fruitcolor' data to browser
    echo $fruit->fruitname."</br>";
    echo $fruit->fruitcolor."</br></br>";
}

//var_dump($contents);

?>
