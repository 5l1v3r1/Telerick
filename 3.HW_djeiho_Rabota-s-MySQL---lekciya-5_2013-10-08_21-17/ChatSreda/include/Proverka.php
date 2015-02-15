<?php

$Errors = FALSE;
$UserName = strtolower(trim($_POST['UserName']));
$Pass = trim($_POST['Password']);

if (mb_strlen($Pass) < 5) {
    echo "<p>Паролата ви е прекалено къса!</p>";
    $Errors = TRUE;
}

if (mb_strlen($UserName) > 30 || mb_strlen($UserName) < 5) {
    echo'<p>Името ви трябва да е в интервалите от 5 до 40 символа</p>';
    $Errors = TRUE;
}

if (!preg_match('@[A-Za-z0-9А-Яа-я]@', $UserName)) {
    echo '<p>Използвате непозволени симболи</p>';
    $Errors = TRUE;
}
?>
