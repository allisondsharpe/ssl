<?php

/**
 * Name: Allison Sharpe
 * Date: 12/14/15
 * Class: Server Side Languages
 * Assignment: Homework/Wk4
 */

session_start();
$_SESSION["message"] = "<div class='msg'><h4> Your contact has been successfully updated! </h4></div>"; //will alert the user if their update was successful

$user = "root";
$pass = "root";
$mysql = 'mysql:host=localhost;dbname=ssl;port=8889'; //calling to database 'ssl'
$dbh = new PDO($mysql, $user, $pass);

$contactid = $_GET['id']; //using '$_GET' to get values for 'id'
$stmt = $dbh->prepare("SELECT * FROM contacts WHERE id = :id"); //using 'prepare' to select all rows from table 'contacts' by their id
$stmt->bindParam(':id', $contactid); //using 'bindParam()' to bind all values for 'id' with variable $contactid
$stmt->execute();
$return = $stmt->fetchAll(PDO::FETCH_ASSOC); //using 'fetchAll()' will return all values to the browser

if (isset($_POST['submit'])) {
    if(!filter_var($_POST['website'], FILTER_VALIDATE_URL)) //filtering the 'website' field - making sure it's a valid website
    {
        echo "<div class='msg'><h4> Error! Please insert a valid website! </h4></div>"; //will alert the user if the website they entered isn't valid
    } else {
        $contactid = $_GET['id']; //using $_GET and $_POST to gather values for each variable
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $website = $_POST['website'];

        //using 'prepare' will gather values from table 'contacts' and display them to the browser
        $stmt = $dbh->prepare("UPDATE contacts SET fullname='" . $fullname . "', phone='" . $phone . "', email='" . $email . "', website='" . $website . "' WHERE id='" . $contactid . "'");
        $stmt->execute();
        header('Location: contacts.php'); //re-directs page back to 'contacts.php'
        die();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/update.css"/> <!-- inserting stylesheet 'contacts.css' -->
</head>
<body>

<h1> Update Contacts </h1>

<!-- form will display original values entered from 'contacts.php' and will allow user to modify them -->
<form action="" method="POST">
    <h2>First Name:</h2><input type="text" class="input" name="fullname" value=<?php echo '"' .$return[0]['fullname'].'"'; ?> required /></br>
    <h2>Phone:</h2><input type="tel" class="input" name="phone" value=<?php echo '"' .$return[0]['phone'].'"'; ?> required /></br>
    <h2>Email:</h2><input type="email" class="input" name="email" value=<?php echo '"' .$return[0]['email'].'"'; ?> required /></br>
    <h2>Website:</h2><input type="text" class="input" name="website" value=<?php echo '"' .$return[0]['website'].'"'; ?> required /></br>
    <input id="save" type="submit" name="submit" value="Save" />
</form>

</body>
</html>

