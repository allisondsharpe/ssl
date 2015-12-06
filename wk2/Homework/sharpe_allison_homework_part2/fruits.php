<?php

/**
 * Name: Allison Sharpe
 * Date: 12/2/15
 * Class: Server Side
 * Assignment: Fruit DB App
 */

$user="root";
$pass="root";
$dbh= new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass); //getting database "SSL" from SEQUEL PRO


if ($_SERVER['REQUEST_METHOD']=='POST') {
    $fruitname=$_POST['fruitname']; //getting values for 'fruitname' and fruitcolor from POST
    $fruitcolor=$_POST['fruitcolor'];
    $stmt = $dbh->prepare('INSERT INTO fruits (fruitname, fruitcolor) VALUES (:fruitname, :fruitcolor);'); //inserting values into database "SSL"
    $stmt->bindParam(':fruitname', $fruitname);
    $stmt->bindParam(':fruitcolor', $fruitcolor);
    $stmt->execute(); //executes the values for 'fruitname' 'and fruitcolor' into database "SSL"
}

?>

<!--------- BEGIN HTML --------->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fruits Galore</title>
</head>
<body>
    <form action="fruits.php" method="post"> <!-- form for the user to fill out -->
        <fieldset>
            <legend>Specify a Fruit!</legend>
            Fruit Name: <input type="text" name="fruitname" value="" required/>
            Fruit Color: <input type="text" name="fruitcolor" value="" required/><br><br>
            <input type="submit" value="Submit" name="submit">
        </fieldset>
    </form>
</body>
</html>

<!----------- END HTML ------------>

<?php

$stmt = $dbh->prepare('SELECT * FROM fruits order by id ASC;'); //‘PREPARE’ will select all rows from table “fruits” in database “SSL”
$stmt->execute();
$values = $stmt->fetchall(PDO::FETCH_ASSOC); // ‘FETCH_ASSOC’ will return values within array set for each row

foreach ($values as $itemRow) { //foreach loop prints returned values to the browser
    echo '<br/>Your Id: '.$itemRow['id'].' <br/>
    Your Fruit Name: '.$itemRow['fruitname'].' <br/>
    Your Fruit Color: '.$itemRow['fruitcolor'].' <br/>
    <a href="deletefruit.php?id='.$itemRow['id'].'" name="delete">Delete Row</a><br/><br/>';
}

?>
