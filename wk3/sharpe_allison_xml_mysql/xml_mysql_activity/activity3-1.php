<?php

/**
 * =====================
 * Name: Allison Sharpe
 * Date: 12-08-15
 * Class: SSL
 * Activity: XML with MySQL
 * =====================
 */

$contents = simplexml_load_file("http://localhost:8888/SSL/Week3/activities/xml_mysql_activity/fruitxml.php"); //getting contents from 'fruitxml.php'

var_dump($contents); //var_dump will display results for $contents to browser

foreach($contents->fruit as $fruit) { //using foreach loop to print 'fruitname' and 'fruitcolor' data to browser
    echo $fruit->fruitname."</br>"; //echoing 'fruitname' to browser
    echo $fruit->fruitcolor."</br>"; //echoing 'fruitcolor' to browser
    echo "</br></br>";
}

?>