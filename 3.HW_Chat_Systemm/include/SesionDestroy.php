<?php
include 'header.php';
session_destroy();
header('Location: ../index.php'); 
exit;
echo"Destroy";
include 'footer';
?>
