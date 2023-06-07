<?php 
include 'database.php';
$pieceid = $_POST['pieceid'];
$roster = mysqli_query($link,"SELECT * FROM roster WHERE typeid='$pieceid'");
mysqli_close($link);
$entry = mysqli_fetch_assoc($roster);
echo json_encode($entry);
?>