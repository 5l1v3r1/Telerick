<?php $Title = 'Вход'; ?>
<?php include '/include/header.php';
include 'include/SQLconnect.php';
?>
<?php
if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == TRUE) {
    // echo"Здравей";
    header('Location:AllMes.php');
} else {

    if ($_POST) {
        include 'include/proverka.php';

        $Select2 = mysqli_query($connection, 'SELECT user,password FROM users');
        while ($row = $Select2->fetch_assoc()) {
            if ($row['user'] == $UserName && $row['password'] == $Pass) {
                $_SESSION['isLogin'] = TRUE;
                $_SESSION['UserName'] = $UserName;
                header('Location:index.php');
                exit;
            } else {
                echo '<p>Грешно потребителско име и парола!</p>';
            }
        }
    }
    echo'<div><form action="index.php" method="POST">
        <div>Име:<input type="text" name="UserName"></div>
        <div>Парола:<input type="password" name="Password"></div>
        <div><input type="submit" value="OK"> </div>
        </form></div>';
}
?>
<a href="Reg.php">Регистрация</a>

<?php include '/include/footer.php'; ?>




