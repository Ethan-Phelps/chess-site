<?php 
include 'database.php';
$board = $_POST['board'];
$active = mysqli_query($link,"SELECT * FROM active WHERE board='$board'");
mysqli_close($link);
    $rows = array();
    while($row = $active->fetch_assoc())
    {
        $rows[] = $row;
    }
//$entry[] = mysqli_fetch_assoc($active);
echo json_encode($rows);
?>