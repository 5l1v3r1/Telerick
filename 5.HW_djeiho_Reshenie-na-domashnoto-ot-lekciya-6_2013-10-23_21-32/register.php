<?php
$title='Регистрация';
include './includes/head.php';
include 'includes/SQL_DB.php';
?>
<div><a href="index.php">Начало</a></div>

<?php
if ($_POST) {
    include 'includes/proverka.php';

    $q2 = mysqli_query($connection, 'SELECT user FROM user WHERE `user`="' . $UserName . '"');
    if (mysqli_fetch_assoc($q2)) {
        echo 'Името е заето';
        $ERR=TRUE;
    }



    if (!$ERR) {


        $a = 'INSERT INTO user(user,password)VALUE ("' . $UserName . '","' . $Password . '")';
        if (mysqli_query($connection, $a)) {
            echo 'Регистрирахте се успешно <a href="index_vhod.php">Влез</a>';
            
        } 
    }
}
?>




<form method="POST">
    <div><input type="text" name="UserName" placeholder="User Name"></div>
    <div> <input type="text" name="password" placeholder="Password"></div>
    <input type="submit"  value="ÓK">
</form>


<?php include 'includes/footer.php'; ?>