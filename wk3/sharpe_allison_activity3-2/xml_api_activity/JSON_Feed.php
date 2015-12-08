<?php

/**
 * =====================
 * Name: Allison Sharpe
 * Date: 12-07-15
 * Class: SSL
 * =====================
 */

header("Content-type:application/json"); //tells browser contents of page is json

$jsonfile = '{'; //opening file
$jsonfile .= '"candy_list":['; //primary file
$jsonfile .= '{"candy_name":"Airheads", "flavor":"Strawberry"},'; //1st array member
$jsonfile .= '{"candy_name":"Jolly Rancher", "flavor":"Cherry"},'; //2nd array member
$jsonfile .= ']'; //closing elements
$jsonfile .= '}'; //closing file

echo $jsonfile; //echoing $jsonfile to browser

?>

<?php

//saving json file to computer

$myjson = json_encode($jsonfile); //stores result in variable $myjson

file_put_contents('myjson.json', $myjson); //saves file as "myjson.json"

?>

