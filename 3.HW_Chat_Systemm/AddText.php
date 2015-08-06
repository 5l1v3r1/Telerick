<?php
$Title = 'Ново съобщение';
include '/include/header.php';
include 'include/IsUser.php';
include 'include/SQLconnect.php';
?>

<?php
if ($_POST) {
    $title = trim($_POST['TitleText']);
    $title = mysqli_real_escape_string($connection, $title);
    $text = trim($_POST['text']);
    $text = mysqli_real_escape_string($connection, $text);
    $greshka = FALSE;

    if (mb_strlen($title) < 1) {
        echo '<p>Моля добавете заглавие</p>';
        $greshka = TRUE;
    } elseif (mb_strlen($title) > 50) {
        echo '<p>Превишили сте  максималния брой символи в заглавието "50"</p>';
        $greshka = TRUE;
    }

    if (mb_strlen($text) < 1) {
        echo'<p>Моля въведете текс</p>';
        $greshka = TRUE;
    } elseif (mb_strlen($text) > 255) {
        echo '<p>Превишили сте максималният брой символи в текста "255"</p>';
        $greshka = TRUE;
    }

    if (!$greshka) {
        $date = date("Y-m-d G:i:s");
        $AddTxt = 'INSERT INTO message VALUE (0,"' . $title . '","' . $text . '","' . $_SESSION['UserName'] . '","' . $date . '")';
        if (mysqli_query($connection, $AddTxt)) {
            header('Location:AllMes.php');
        }
    }
}
?>

<a href="AllMes.php">Всички съобщения</a>
<form method="POST">
    <div> <input type="text" name="TitleText" placeholder="ЗАГЛАВИЕ" > </div>
    <div>  <textarea name="text" cols="50" rows="15" placeholder="ТЕКСТ"></textarea></div>
    <input type="submit" value="ОК">


</form>

<?php include '/include/footer.php'; ?>
