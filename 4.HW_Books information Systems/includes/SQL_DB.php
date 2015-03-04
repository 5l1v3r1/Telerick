<?php

$connection = mysqli_connect('localhost', 'root', '', 'books');
if (!$connection) {
    echo 'Database is noc conect ';
    exit;
}
else {
    mysqli_set_charset($connection, 'utf8');
}
?>
