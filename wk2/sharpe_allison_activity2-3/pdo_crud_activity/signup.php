<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>
<body>

<?php
//if the form is not set do nothing
if(isset($_POST['submit'])) {

    //check to see if username, password, avatar is null
    if ($_POST['password'] != null && $_POST['user'] != null) {
        //read in all form fields into an "associate" array & return array for processing output
        function makeArray()
        {
            $salt = "SuperAllisonSaltHash";
            $epass = md5($_POST['password'] . $salt);
            $euser = $_POST['user'];

            return array("USER NAME" => $euser, "Hashed PASSWORD with Dash of Salt" => $epass);
        }

        //output login details to user
        echo "<h2>Congratulations!</h2>Your membership account sign-up was successful!";
        echo "<table width=100% align=left border=0><tr><td>";

        //convert array into variable
        $data = makeArray();

        //foreach for displaying array contents created in makeArray function
        foreach ($data as $attribute => $data) {
            echo "<p align=left><font color= #FF4136>{$attribute}</font>: {$data}";
        }

        //process avatar photo for upload
        $tmp_file = $_FILES['avatarfile']['tmp_name'];
        //given a string containing the path to a file/directory
        //the basename function will return trailing name component
        $target_file = basename($_FILES['avatarfile']['name']);
        $upload_dir = "uploads";

        //move_uploaded_file fill return if $tmp_file is not a valid upload file
        //or if it cannot be moved for any other reason
        if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
            echo "File uploaded successfully.";
            echo "<br/><br/> Your avatar photo: " . $target_file;
            echo "<br/><br/><img src='" . $upload_dir . "/" . $target_file . "' width='200' />";
        } else {
            echo "<br/><br/>Avatar: No photo was uploaded.";
        }
        echo "<br/><br/><a href='database_form.php'>Please try logging in now!</a>";
        echo "</td></tr></table>";

        //setup DB username & password
        $user = 'root';
        $pass = 'root';

        //establish pdo & dsn connection to database
        $dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);

        $salt = "SuperAllisonSaltHash";
        $epass = md5($_POST['password'] . $salt);
        $euser = $_POST['user'];

        //prepare statement for insert
        $stmt = $dbh->prepare("insert into users101 (username, password, avatar)
            values (:username, :password, :avatar)");
        $stmt->bindParam(':username', $euser);
        $stmt->bindParam(':password', $epass);
        $stmt->bindParam(':avatar', $target_file);
        $stmt->execute();
    } else {
        echo "Sorry, you must submit ALL registration fields to proceed.<br><br>";
        echo "<a href='database_form.php'> Try again? </a><br><br>";
    }

} ?>

</body>
</html>