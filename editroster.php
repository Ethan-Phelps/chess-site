<?php
include 'database.php';
$unicode = $_POST['unicode'];
$name = $_POST['name'];
$description = $_POST['description'];
$pieceid = $_POST['pieceid'];
mysqli_query($link,"UPDATE roster SET unicode = '$unicode', name= '$name', description= '$description' WHERE typeid='$pieceid'");
mysqli_close($link);
?>
