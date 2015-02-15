<?php
include 'SQL_DB.php';
    $UserName = ucfirst(trim($_POST['UserName']));
    $Password = trim($_POST['password']);
    $UserName = mysqli_real_escape_string($connection, $UserName);
    $Password = mysqli_real_escape_string($connection, $Password);


    $ERR = FALSE;

    if ((mb_strlen($UserName)) < 5) {
        echo"Потребителското ви име е прекълено късо";
        $ERR = TRUE;
    }

    if ((mb_strlen($Password)) < 5) {
        echo '<p>Паролата ви е прекълено къса</p>';
        $ERR = TRUE;
    }

    if (!preg_match('@[A-Za-z0-9А-Яа-я]@', $UserName)) {
        echo '<p>Използвате непозволени символи</p>';
        $ERR = TRUE;
    }
?>
