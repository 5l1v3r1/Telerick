
<?php
$title = 'Вход';
include 'includes/head.php';
?>
<a href='register.php'>Регистрация</a>

<?php
if ($_POST) {

    if (isset($_SESSION['IsUser']) && $_SESSION['IsUser'] == TRUE) {
        header('Location:all.php');
    } else {
        include 'includes/proverka.php';

        if (!$ERR) {
            $SQL = 'SELECT * FROM user WHERE `user`="' . $UserName . '" and `password`="' . $Password . '"';
            $UserPR = mysqli_query($connection, $SQL);
            if ($Us = mysqli_fetch_assoc($UserPR)) {
                $_SESSION['IsUser'] = TRUE;
                $_SESSION['UserID'] = $Us['user_id'];
                $_SESSION['UserName'] = $Us['user'];
                header('location:index.php');
            } else {
                echo '<p>Грешно потребителско име или парола </p>';
            }
        }
    }
}
?>




<form method="POST">
    <div><input type="text" name="UserName" placeholder="User name"></div> 
    <div><input type="password" name="password" placeholder="Password"></div> 
    <input type="submit" valur="OK">
</form>










<?php include 'includes/footer.php'; ?>

