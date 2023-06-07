<?php
include 'database.php';
mysqli_query($link,"INSERT INTO roster (name, unicode, description)
VALUES ('new piece', '95', 'description of piece movement')");
mysqli_close($link);
?>
