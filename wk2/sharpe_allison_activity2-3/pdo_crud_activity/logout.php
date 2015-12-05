<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>
<body>

<?php

//begin session
session_start();

//unset all of session variables
session_unset();

//destroy session
session_destroy();
?>

<h2> You are now logged out. See ya next time. </h2>
<a href='database_form.php'>Login</a>&nbsp;|&nbsp;
<a href='dashboard.php'>Dashboard</a>&nbsp;|&nbsp;

<pre>
    <?php
    print_r(get_defined_vars());
    ?>
</pre>
<br>

</body>
</html>