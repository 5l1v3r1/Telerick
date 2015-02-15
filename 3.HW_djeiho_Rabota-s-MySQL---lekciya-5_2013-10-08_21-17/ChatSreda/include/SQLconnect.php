<?php
$connection = mysqli_connect('localhost', 'medion', '123456789', 'user', 3306);
        if (!$connection) {
            echo 'No Database';
            exit;
        } else {
            mysqli_set_charset($connection, 'utf8');
        }
?>
