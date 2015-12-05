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

//establish DB connection
$user = 'root';
$pass = 'root';
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

//grab requested client id & record where id equal;
$userid = $_GET['id'];

//select all fields for matching user for later pre populating/updating
$stml=$dbh->prepare("SELECT * FROM users101 where userid = :userid");
$stml->bindParam(':userid', $userid);
$stml->execute();
$result = $stml->fetchall(PDO::FETCH_ASSOC);

//setup navigation
echo "&nbsp;|&nbsp; <a href='profile.php'>My Profile</a>&nbsp;|&nbsp;";
echo "<a href='dashboard.php'>Update More?</a>";

//validate/filter the $_GET url entered by user
//then, execute mysql update & return to dashboard.php page
if(isset($_POST['submit'])){
    $userid = $_GET['id'];
    $username = $_POST['user'];
    $stmt=$dbh->prepare("UPDATE users101 SET username='" .$username."' WHERE userid='" .$userid."';");
    $stmt->execute();

    header('Location: dashboard.php');
} ?>

<h2> Update User Console </h2>

<form action="" method="post">
    You are about to edit the following USERNAME:<input type="text" name="user"
                                                        value=<?php echo '"' .$result[0]['username'].'"'; ?> /><br>
    <input type="submit" name="submit" value="Update Database" />
</form>

<hr>
<br><br><br><br>
<pre>
    <?php
    print_r(get_defined_vars());
    ?>
</pre>
</br>

</body>
</html>
