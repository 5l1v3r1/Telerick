<?php session_start() ?>  
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title<?php echo $title; ?></title>
    </head>
    <body style="background: url(./includes/body.jpg)">
        <?php
        mb_internal_encoding('UTF-8');
        date_default_timezone_set("Europe/Sofia"); ?>