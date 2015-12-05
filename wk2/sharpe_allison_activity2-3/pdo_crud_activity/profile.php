<?php
/**
 * =====================
 * Project: SSL
 * File: CRUD 101 - Class Analysis(login.php)
 * User: Allisonsharpe
 * =====================
 */

// begin session
session_start();

// check if users is already logged in
if(isset($_SESSION['user_id'] )) {
    echo 'Session Status: User is already logged in<br/>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>
<body>

<?php
//setup navigation
    echo "<a href='dashboard.php'>Dashboard</a>&nbsp;|&nbsp;";
    echo "<a href='logout.php'>Logout</a>&nbsp;|&nbsp;";

//check to see if session variables for username, password is null
if ($_SESSION['pass_word'] != null && $_SESSION['user_name'] != null) {

    //read in all form fields into an "associative" array & return array for processing output
    function makeArray() {
        $epass = $_SESSION['pass_word']; //already salted from earlier
        $euser = $_SESSION['user_name'];
        $avatarfile = $_SESSION['avatar_file'];

        return array("Username: " => $euser, "Hashed Password w/Salt" => $epass,
            "Avatar" => $avatarfile);

    }

    //output login details to user
    echo "<h2> User Profile Page - Welcome!</h2>";
    echo "<table width=100% align=left border=0><tr><td>";

    //convert array into variable
    $data = makeArray();

    //foreach for displaying array contents created in makeArray function
    foreach($data as $attribute => $data) {
        echo "<p align=left><font color=#FF4136>{$attribute}</font>: {$data}";
    }
    //if $_SESSION variable for avatar is not missing, show it
    //other wise, give message: no photo uploaded
    if(!empty($_SESSION['avatar_file'])) {
        echo "<br/><br/>Your Avatar Photo: " . $_SESSION['avatar_file'];
        echo "<br/><br/><img src='" . "uploads" . "/" .
            $_SESSION['avatar_file'] . "' width='200'/>";
    }else{
        echo "<br/><br/>Avatar: No photo was uploaded.";
    }
    echo "</td></tr></table>";
}else{
    echo "Sorry, you are not currently logged in.<br><br>";
    echo "<a href='database_form.php'>Try again?</a><br><br>";
}
?>


</body>
</html>

