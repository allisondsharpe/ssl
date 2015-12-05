<?php

session_start();

//if $_SESSION variable "user_name" is not empty, give welcome..
if(!empty($_SESSION["user_name"])) {

    ?>

    Welcome <b><?php echo $_SESSION["user_name"]; ?></b>! ~
    Click here to <a href="logout.php">Logout</a>&nbsp;|&nbsp;

    <?php

//and store other session variables from Super Global $_SESSION
    $user_id = $_SESSION['user_id'];
    $usernameInput = $_SESSION['user_name'];
    $passwordInput = $_SESSION['pass_word'];
    $avatarfile = $_SESSION['avatar_file'];
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
//grab userid from previous page using $_GET

$userid = $_GET['id'];

//setup navigation
echo "<a href='profile.php'>My Profile</a>&nbsp;|&nbsp;";
echo "<a href='dashboard.php'>Delete More?</a>";

if(isset($_POST['submit'])) {

    //establish DB connection
    $user = 'root';
    $pass = 'root';
    $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

    //use $_GET to confirm userid
    $userid = $_GET['id'];

    //use prepare to delete userid //
    $stmt = $dbh->prepare("DELETE FROM users101 WHERE userid IN (:userid)");

    $stmt->bindParam(':userid', $userid);
    $stmt->execute();

    header('location: dashboard.php');
}

?>

<h2> Delete User Console </h2>

<br><br> Are you sure you want to delete User Id <?php echo '"' .$userid. '"'; ?> ?<br/><br/>

<form action="" method="post">
    If so, click yes... <input type='submit' name='submit' value='Yes, Delete it now!' />
</form>



</body>
</html>