<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Uploads</title>
</head>
<body>

<?php
if(isset($_POST['submit'])) {

    $tmp_file = $_FILES['uploadFile']['tmp_name'];
    $main_file = basename($_FILES['uploadFile']['name']);
    $uploads_dir = "uploads";

    if(move_uploaded_file($tmp_file, $uploads_dir.$main_file)) {
        $file_status = "Congratulations! Your file has been uploaded successfully.";
    }else{
        $file_status = "Oh no! Something went wrong while uploading your file..";
    }
} ?>

<?php
if(!empty($file_status)) {
    echo "<p> Message: {$file_status} </p>";
    echo "<div class='img'><img src='" . $uploads_dir . $main_file . "' width='500'/></div>";
} ?>

<h1> Upload Image: </h1>

<form action="activity1-4.php" enctype="multipart/form-data" method="POST">
    <input type="file" name="uploadFile" />
    <input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>

