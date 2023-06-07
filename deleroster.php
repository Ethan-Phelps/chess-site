<?php
include 'database.php';
$pieceid = $_POST['pieceid'];
mysqli_query($link,"DELETE FROM roster WHERE typeid='$pieceid'");
mysqli_close($link);
?>
