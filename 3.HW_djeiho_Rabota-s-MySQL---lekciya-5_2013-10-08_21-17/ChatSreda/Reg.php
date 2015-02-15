<?php include 'include/header.php'; ?>
<a href="index.php">Назад</a>
<?php
include 'include/SQLconnect.php';

if ($_POST) {
    include 'include/Proverka.php';

    $UserName = mysqli_real_escape_string($connection, $UserName);
    $Pass = mysqli_real_escape_string($connection, $Pass);

    $q = mysqli_query($connection, "SELECT user FROM users WHERE user = '$UserName'");
    if ($q->fetch_assoc()) {
        echo '<p>Името е заето</p>';
        $Errors = TRUE;
    }



    if (!$Errors) {
        $UserInser = 'INSERT INTO users (user,password) VALUES ("' . $UserName . '","' . $Pass . '")';
        if (mysqli_query($connection, $UserInser)) {
            echo '<p>Регистрацията мина успещно може да влезете в системата</p>';
            header('Location:index.php');
        }
    } else {
        echo '';
    }
}
?>
<form method="POST">
    <div><input type="text" name="UserName" value="" placeholder="Your Username"></div>
    <div><input type="password" name="Password" value="" placeholder="Password"></div>
    <input type="submit" value="Ok">

</form>




<?php include 'include/footer.php'; ?>