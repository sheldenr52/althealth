<?php 
$filename=filter_input(INPUT_POST,'file');

echo $filename;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Choose Database To Restore</title>
</head>
<body>
    <form method="POST" action="Restore.php">
        <input type="file" name="file">

        <input type="submit" value="Restore Database">
        <p><strong>Note:</strong> Select Choose file to find the database that you want to use and then click Restore Database. The Databases can be found at location: "C:\xampp\htdocs\althealth\data" </p>
    </form>
</body>
</html>