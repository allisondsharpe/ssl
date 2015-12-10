<?php

/**
 * =====================
 * Name: Allison Sharpe
 * Date: 12-07-15
 * Class: SSL
 * Activity: Filesystem Functions
 * =====================
 */

$json_api = file_get_contents("http://jsonplaceholder.typicode.com"); //source: http://jsonplaceholder.typicode.com/
echo $json_api; //echoing $json_api to browser
echo "<hr/>"; //"<hr/>" will display two lines as to represent a line break

$json_api2 = file_get_contents("http://www.omdbapi.com/?t=goodfellas"); //getting contents for link in FSO
echo $json_api2; //echoing $json_api2 to browser
echo "<hr/>";

$file = 'dictionary.txt'; //file for 'dictionary.txt'
if($handle = fopen($file, 'r')) { //reading 'dictionary.txt'
    $content = fread($handle, 22); //printing each character out to browser
    fclose($handle); //closes file
}

echo "<hr/>";
echo nl2br($content); //'nl2br' will display $content
echo "<hr/>";

?>

