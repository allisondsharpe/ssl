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

    <h1>$_SESSION Results:</h1> <!-- using $_SESSION -->

    <?php
        echo $_SESSION['firstname'] . '<br/>';
        echo $_SESSION['lastname'] . '<br/>';
        echo $_SESSION['dob'];
    ?>

    <h1>$_GET Results:</h1> <!-- using $_GET -->

    <?php
        echo $_GET['firstname'] . '<br/>';
        echo $_GET['lastname'] . '<br/>';
        echo $_GET['dob'];
    ?>

</body>
</html>