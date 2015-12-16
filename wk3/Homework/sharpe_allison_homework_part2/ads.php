<?php

/**
 * Name: Allison Sharpe
 * Date: 12/09/15
 * Class: Server Side Languages
 * Assignment: Fruit Ads API
 */


$user = "root"; //defining variables $user & $pass
$pass = "root";
$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass); //calling database "ssl"

if($_SERVER['REQUEST_METHOD'] == 'POST') { //using post to pass variables for $fruitname, $fruitcolor, and $fruitimage
    $fruitname = $_POST['fruitname'];
    $fruitcolor = $_POST['fruitcolor'];
    $fruitimage = $_POST['fruitimage'];
    //inserting values for variables $fruitname, $fruitcolor, and $fruitimage
    $stmt = $dbh->prepare("INSERT INTO fruits (fruitname, fruitcolor, fruitimage) VALUES (:fruitname, :fruitcolor, :fruitimage);");
    //binding values for $fruitname, $fruitcolor, and $fruitimage using 'bindParam()'
    $stmt->bindParam(':fruitname', $fruitname);
    $stmt->bindParam(':fruitcolor', $fruitcolor);
    $stmt->bindParam(':fruitimage', $fruitimage);
    $stmt->execute(); //executing $stmt (statement)
}
?>

<!---------- HTML ------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fruit Ads API</title>
</head>
<style>
    th, td {
        border-right: 1px solid #000;
    }

    th {
        text-decoration: underline;
    }

    img {
        border: 2px solid red;
        padding: 10px;
        margin-bottom: 20px;
    }
</style>
<body>

    <?php
        //getting contents from 'fruitget.php'
        $contents = file_get_contents("http://localhost:8888/Homework/Week3/fruitget.php");
        $encoded_json = json_decode($contents); //'decode' converts json file to array

    //foreach loop that prints values for $fruitname, $fruitcolor, and $fruitimage to browser
    foreach ($encoded_json as $fruit) {
        $fruitname = $fruit->fruitname;
        $fruitcolor = $fruit->fruitcolor;
        $fruitimage = $fruit->fruitimage;
        //echoing the fruitname and the fruitimage to the browser
        echo "<h1> Your fruit of the day is: $fruit->fruitname </h1><img src='" . $fruitimage . "' width=250'>";
    } ?>

    <!-- form action calls to 'ads.php' -->
    <form action="ads.php" method="POST" enctype="multipart/form-data">
       Fruit Name:
         <input type="text" name="fruitname" placeholder="Fruit Name" required><br>
       Fruit Color:
         <input type="text" name="fruitcolor" placeholder="Fruit Color" required><br>
       Fruit Image:
         <input type="text" name="fruitimage" placeholder="Paste URL here" required><br><br>
         <input type="submit" name="upload" value="Submit">
       <!-- 'reset' will reset each input field inside form -->
         <input type="reset" name="reset" value="Reset"><br><br>
    </form>

    <!-- table for values for each variable to be placed within -->
    <table>
        <tr>
          <th>Fruit ID:</th>
          <th>Fruit Name:</th>
          <th>Fruit Color:</th>
          <th>Fruit Image:</th>
          <th>Action:</th>
        </tr>

    <?php
       $stmt = $dbh->prepare('SELECT * FROM fruits order by id ASC'); //'prepare' will select all rows from 'fruits' table by id
       $stmt->execute();
       $return = $stmt->fetchall(PDO::FETCH_ASSOC); //'fetchAll() will return those values

    foreach ($return as $item_row) { //'foreach' loop will gather values and print them to the browser
       echo '<tr><td>' . $item_row['id'] . '</td><td>' . $item_row['fruitname'] . '</td><td>' . $item_row['fruitcolor'] . '</td><td>' . $item_row['fruitimage'] . '</td><td><a href="deletefruit.php?id=' . $item_row['id'] . '">Delete Row</a></td></tr>';
    }
    ?>

    </table>

</body>
</html>

