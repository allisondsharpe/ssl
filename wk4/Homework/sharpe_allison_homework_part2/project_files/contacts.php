<?php

/**
 * Name: Allison Sharpe
 * Date: 12/14/15
 * Class: Server Side Languages
 * Assignment: Homework/Wk4
 */

session_start(); //starting session

//display session message if it exists
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
}

//variables for '$username' and $password
$user = "root";
$pass = "root";
$db = 'mysql:host=localhost;dbname=ssl;port=8889'; //calling to database 'ssl'
$dbh = new PDO($db, $user, $pass);

if($_SERVER['REQUEST_METHOD']=='POST') {
    if(!filter_var($_POST['website'], FILTER_VALIDATE_URL)) //filtering the 'website' field - making sure it's a valid website
    {
    echo "<div class='msg'><h4> Error! Please insert a valid website! </h4></div>"; //will alert the user if the website they entered isn't valid
}else {
        $_SESSION["message"] = "<div class='msg'><h2> Your contact has been added! </h2></div>"; //will alert user once they've added a new contact
        $dbh = new PDO($db, $user, $pass); //calling variables to database
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        //will insert values into database
        $stmt = $dbh->prepare("INSERT INTO contacts (fullname, phone, email, website) VALUES (:fullname, :phone, :email, :website);");
        //'bindParam()' will bind all values for each variable
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':website', $website);
        $stmt->execute();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Messenger App</title>
    <link rel="stylesheet" type="text/css" href="css/contacts.css"> <!-- inserting stylesheet 'contacts.css' -->
</head>
<body>

<h1> My Contact Manager App </h1>
<p> Enter a contact below to get started. </p>

<!-- form for 'contacts.php' -->
<form action="contacts.php" method="POST">
    <label class="label"> Full Name: </label> <input type="text" class="input" name="fullname"><br>
    <label class="label"> Phone Number: </label> <input type="tel" class="input" name="phone"><br>
    <label class="label"> Email Address: </label> <input type="text" class="input" name="email"><br>
    <label class="label"> Website: </label> <input type="text" class="input" name="website"><br><br>
    <input type="submit" class="btn" name="submit" value="Submit">
</form>

<h2> Contact(s): </h2>

<?php
    //select all rows from table 'contacts' by using 'prepare'
    $stmt=$dbh->prepare("SELECT * FROM contacts ORDER BY id");
    $stmt->execute();
    $return = $stmt->fetchall(PDO::FETCH_ASSOC); //using 'fetchall', will return all values to browser
    foreach ($return as $item_row) { //using 'foreach' to loop through values and display them to the browser
        echo "<div class='contact_list'>";
        echo '<h3>Full Name: '.$item_row['fullname']."</h3>"; //displays returned values from $item_row and displays them to the browser
        echo '<h3>Phone Number: '.$item_row['phone']."</h3>";
        echo '<h3>Email Address: '.$item_row['email']."</h3>";
        echo '<h3>Website: '.$item_row['website']."</h3><br>";
        echo '<a href="delete.php?id='.$item_row['id'].'"><button class="btn">Delete</button></a>'; //adding in button for 'delete'
        echo '<a href="update.php?id='.$item_row['id'].'"><button class="btn">Update</button></a>'; //adding in button for 'update'
        echo "</div>";
    }

?>

</body>
</html>