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
    <title>MySQL & PHP - by Allison</title>
    <meta name="description" content="">
    <meta name="author" content="">

</head>
<body>

<?php

//setup DB username & password
$user = 'root';
$pass = 'root';
$salt = "SuperAllisonSaltHash";

//establish PDO & DSN connection to database
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

//test if 1st form has empty fields;
//if not, grab username & password & bind to DB parameters
if($_POST['username_li'] != null && $_POST['password_li'] != null) {
    //grab form input
    $usernameInput = $_POST['username_li'];
    $passwordInput = md5($_POST['password_li'] . $salt);

    //prepare statement; find record that matches username & password
    $sth = $dbh->prepare('select userid, username, password, avatar from users101
                    where username = :username and password = :password');
    $sth->bindParam(':username', $usernameInput);
    $sth->bindParam(':password', $passwordInput);
    $sth->execute();
    $result = $sth->fetchAll();

    //if result of 1st array item contains 'userid'
    //let user know they have successfully logged in
    if (isset($result[0]['userid'])) {

        //begin session processor
        //grab results of earlier select statement
        $user_id = $result[0]['userid'];
        $avatarfile = $result[0]['avatar'];

        //set session user_id variable & others
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $usernameInput;
        $_SESSION['pass_word'] = $passwordInput;
        $_SESSION['avatar_file'] = $avatarfile;
        echo "Session Check: You are now logged in<br/><br/>";
        //end session processor

        echo "Congratulations! You have successfully logged in. Enjoy!<br>";
        echo "<a href='logout.php'> Logout </a>&nbsp; |&nbsp;";
        echo "<a href='dashboard.php'> Dashboard </a>&nbsp;|&nbsp;";
        echo "<a href='login.php'> Back to Login </a>&nbsp;|&nbsp;";

    //use userid to loop up username & profile photo
    foreach ($result as $row) {

        //prepare/bind/execute and grab results to echo $row['userid]. "<br>"
        $sth = $dbh->prepare('select username, avatar from users101 where userid = :userid');
        $sth->bindParam(':userid', $row['userid']);
        $sth->execute();
        $result = $sth->fetchAll();

        //optional analysis:
        //print_r($result[0]['username']);

        //store each row found in $results
        echo "<p>";
        $userid = $row['userid'];
        foreach ($result as $row) {
            $photo = $row['avatar'];
            $username = $row['username'];
        };

        //echo out profile photo and give user an option to logout
        if(!empty($photo)) {
            echo "<img src=\"uploads/" . $photo . "\" width=\"200\" class=\"right userPhoto\"/><br>";
        }else{
            echo "Avatar Status: You did not provide an avatar photo during sign-up.";
        }

        echo "</p>";
        echo "<ul class=\"right userSection\">
                <li> Your user ID is: ".$userid."</li>
                <li> Your username is: ".$username."</li>
              </ul>";
    }; // close out the FIRST foreach loop!

    }else{
        //else let user know that their login failed
        echo "Sorry, your login failed! <br> Username or password is incorrect<br>";
        echo "<a href='database_form.php'> Go back? </a><br><br>";
    } //close out inner "if" statement (2nd if statement)
}else{
    //else for outer parent "if" statement (1st if statement)
    echo "Sorry, you must submit both LOGIN fields to proceed.<br><br>";
    echo "<a href='database_form.php'> Try again? </a><br><br>";
}//close out outer parent "if" statement (1st if statement)

?>


</body>
</html>