<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms & Validating User Input</title>
</head>
<body>

<form action="activity1-5.php" method="POST">
    School Email: <input type="text" name="school_email" value="">
    Personal Email: <input type="text" name="personal_email" value="">
    <input type="submit" value="Submit"><br/><br/>
</form>

<?php $school_email = $_POST['school_email']; $personal_email = $_POST['personal_email'];
    echo "Your school email is: $school_email </br> Your personal email is: $personal_email </br></br>";
    echo "Your 'filter_var' message: </br>";

    if (!filter_var($personal_email, FILTER_VALIDATE_EMAIL === false)) {
        echo "Your personal email has been successfully validated.<br/>";
    } else {
        echo "Your personal email has NOT been successfully validated.<br/>";
    }

    echo "</br> Your 'preg_match' message: </br>";
    $preg = '/fullsail.edu/';

    if (!preg_match($preg, $school_email === false)) {
        echo "Congratulations! Your school email was a successful match.";
    }else {
        echo "Uh oh. Your school email was NOT a successful match.";
    }
?>

</body>
</html>
