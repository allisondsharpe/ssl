<!-- Name: Allison Sharpe -->
<!-- Date: 11-27-15 -->
<!-- Class: Server Side Languages -->


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmation Page</title>
</head>
<body>

<?php
function formArray() { //function that stores values into an array and encrypts password
    $firstname = $_POST['firstname']; $lastname = $_POST['lastname']; $username = $_POST['username']; $password = $_POST['password']; //stores values in array
    $encryptPass = md5("Password Salt". $password); //salting the password
    return array("First Name" => $firstname, "Last Name" => $lastname, "Username" => $username, "Password" => $encryptPass); //returns array values
} ?>

<?php
function avatarImage() { //function that saves avatar image into subdirectory
    if (isset($_POST['submit'])) {

        $tmp_file = $_FILES['uploadFile']['tmp_name']; //temporary file name
        $main_file = basename($_FILES['uploadFile']['name']); //permanent file name for avatar image
        $uploads_dir = "uploads/images/"; //source subdirectory where the image will be stored

        if (move_uploaded_file($tmp_file, $uploads_dir . $main_file)) {
            $file_status = "<br/><h4>Congratulations! Your avatar has been uploaded successfully.</h4>"; //displays if the image has successfully been uploaded
        } else {
            $file_status = "<br/><h4>Oh no! Something went wrong while uploading your avatar...</h4>"; //displays if the image does NOT get uploaded
        }
    }

    if (!empty($file_status)) { //displays the message from the if/else conditional statements within $file_status on the condition of the image
        echo "<p> {$file_status} </p>";
        echo "<div class='img'><img src='" . $uploads_dir . $main_file . "' width='300'/></div>";
    }
} ?>

<?php
if(isset($_POST['submit'])) {
    $returnForm = formArray(); //returns the formArray() function
    echo "<h1>Welcome, " . $returnForm['Username'] . "</h1>
          <h4>Thank you for registering with us. You will receive a confirmation email shortly!</h4><br/>";

    foreach ($returnForm as $arrayForm => $arrayInfo) { //foreach loop that will print values from array to browser
        //arrayForm contains the form variables whereas the arrayInfo contains the information the user submitted to the form
        echo "{$arrayForm}: {$arrayInfo} <br/>"; //prints the stored values from both arrayForm and arrayInfo to the browser
    }
    avatarImage(); //calls the function avatarImage()
} ?>

</body>
</html>


