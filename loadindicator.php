<?php 
include 'database.php';
$board = $_POST['board'];
$indicator = mysqli_query($link,"SELECT * FROM indicator WHERE board='$board'");
mysqli_close($link);
$entry = mysqli_fetch_assoc($indicator);
echo json_encode($entry);
?>