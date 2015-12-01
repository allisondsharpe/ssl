<?php

/*
 * Name: Allison Sharpe
 * Date: 12-01-15
 * Class: Server Side Languages
 */

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Sessions</title>
</head>
<body>

<?php
    //setting my variables with $_SESSION
    $_SESSION['firstname'] = "Allison";
    $_SESSION['lastname'] = "Sharpe";
    $_SESSION['dob'] = "February 25th, 1995";

    $firstname = $_SESSION["firstname"];
    $lastname = $_SESSION['lastname'];
    $dob = $_SESSION['dob'];

    //generating results to getsession.php
    echo "<a href='getsession.php?firstname=" . $firstname . "&lastname=" . $lastname ."&dob=" . $dob . "'>Generate Results</a>";
?>

</body>
</html>