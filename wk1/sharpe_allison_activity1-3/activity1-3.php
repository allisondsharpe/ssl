<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loops</title>
</head>
<body>

Part 1: <br/>

<?php //create array

$colors = array (0 => "Red", 1 => "Maroon", 2 => "Blue", 3 => "Iris", 4 => "Green", 5 => "Olive", 6 => "Orange",
7 => "Amber", 8 => "Yellow", 9 => "Gold");

foreach($colors as $index => $color){
    echo "Color {$index} is {$color}. <br />";
}

?><br/>


Part 2: <br/>

<?php //reverse array

$reverse = sizeof($colors);
for($loop = $reverse - 1; $loop >= 0; $loop--){
    echo "Color {$loop} is {$colors[$loop]}<br />";
}

?><br/>


Part 3: <br/>

<?php

foreach($colors as $loop => $color){
    if($loop % 2 == 0) {
        echo "{$loop} is {$color}<br />";
    }
}

?>

</body>
</html>
