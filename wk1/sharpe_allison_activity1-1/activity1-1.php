<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Variables, Strings, and Arrays in PHP</title>
</head>
<body>

<?php //setting up variables
$name = "Allison";
$age = 20; ?>

<?php
    $person = array($name, $age); //setting up array ?>

<?php //setting up associative values for array
    $person = array($name => "Allison", $age => 20); ?>

<?php //printing values to console - double quotes
    echo "My name is " . $person[$name] . " and age is " . $person[$age]; ?><br/>

<?php //printing values to console - single quotes
    echo 'My name is ' . $person[$name] . ' and age is ' . $person[$age]; ?><br/>

<?php //printing values to console - person index 0 and 1
    $person = array($name, $age);
    echo "My name is " . $person[0] . " and age is " . $person[1]; ?><br/>

<?php //printing values to console - key/value pairs
    $person = array($name => "Allison", $age => 20);
    echo "My name is " . $person[$name] . " and age is " . $person[$age]; ?><br/>

<?php //printing values to console - setting age to null
    $age = null;
    echo is_null($age); //result = "1" ?><br/>

<?php //printing values to console - unsetting name variable
    unset($name);
    echo "My name is " .$name; //result = undefined ?>

</body>
</html>


