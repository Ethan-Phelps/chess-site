<?php
include 'database.php';
$board = $_POST['board'];
$count = $_POST['count'];
$type = $_POST['type'];
$xcor = $_POST['xcor'];
$ycor = $_POST['ycor'];
$rval = $_POST['rval'];
$gval = $_POST['gval'];
$bval = $_POST['bval'];
for ($x = 0; $x < $count; $x++) {
$qvalue = "( ".$board.", ".$type[$x].", ".$xcor[$x].", ".$ycor[$x].", ".$rval[$x].", ".$gval[$x].", ".$bval[$x].")";
if ($x == 0) {
$qvalues = $qvalue;
} else {
$qvalues = $qvalues.",".$qvalue;
}
}
mysqli_multi_query($link,"DELETE FROM active WHERE board = ".$board.";INSERT INTO active (board, typeid, xpos, ypos, rvalue, gvalue, bvalue) VALUES ".$qvalues.";");
mysqli_close($link);
?>