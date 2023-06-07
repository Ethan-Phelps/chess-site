<?php
include 'database.php';
$playernum = $_POST['playernum'];
$currentturn = $_POST['currentturn'];
$board = $_POST['board'];
$c1r = $_POST['c1r'];
$c1g = $_POST['c1g'];
$c1b = $_POST['c1b'];
$c2r = $_POST['c2r'];
$c2g = $_POST['c2g'];
$c2b = $_POST['c2b'];
$c3r = $_POST['c3r'];
$c3g = $_POST['c3g'];
$c3b = $_POST['c3b'];
$c4r = $_POST['c4r'];
$c4g = $_POST['c4g'];
$c4b = $_POST['c4b'];
mysqli_query($link,"UPDATE indicator SET state='$currentturn',setting='$playernum',`color1r`='$c1r',`color1g`='$c1g',`color1b`='$c1b',`color2r`='$c2r',`color2g`='$c2g',`color2b`='$c2b',`color3r`='$c3r',`color3g`='$c3g',`color3b`='$c3b',`color4r`='$c4r',`color4g`='$c4g',`color4b`='$c4b' WHERE board='$board'");
mysqli_close($link);
?>

