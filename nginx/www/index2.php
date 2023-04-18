<?php
$link = mysqli_connect('mysql', 'root', 'root');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';
mysqli_close($link);
?>