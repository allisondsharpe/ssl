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

//if $_SESSION user_id is not set, restrict user access immediately!
if(!isset($_SESSION['user_id']))
{
    echo "<h2>Users101 Dashboard</h2>";
    echo "Sorry, you must be logged in to access this area!<br/>";
    echo "<a href='database_form.php'> Try logging in </a>.";

}else {
    //else, give user access to full dashboard
    //allow user to return to profile page

    echo "<a href='profile.php'>My Profile</a>";
    echo "<h2>Users101 Dashboard</h2>";
    echo "<table width=80% align=center>";
    echo "<tr>";
    echo "<th>User ID</th>";
    echo "<th>User Name</th>";
    echo "<th>Password</th>";
    echo "<th>Profile Photo</th>";
    echo "<th>Action</th></tr>";


    //setup DB username & password
    $user = 'root';
    $pass = 'root';
    $salt = "SuperAllisonSaltHash";


    //establish PDO & DSN connection to database
    $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

    //read everything in database, and sort from a-z
    $stmt = $dbh->prepare('SELECT * FROM users101 order by userid ASC;');
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);


    foreach ($result as $row) {
        echo '<tr><td>' . $row['userid'] . '</td><td>' . $row['username'] . '</td><td>' .
            $row['password'] . '</td><td>' . $row['avatar'] . ' </td><td><a href="deleteuser.php?id= ' .
            $row['userid'] . '">Delete</a></td><td><a href="updateuser.php?id= ' .
            $row['userid'] . '">Update</a></td>';
    }

}

echo "</tr></table>";

?>

</body>
</html>
