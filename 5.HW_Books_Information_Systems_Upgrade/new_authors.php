<?php
$title = 'Нов афтор';
include 'includes/head.php';
include 'includes/SQL_DB.php';
include 'includes/Iss_User.php';
?>
<?php
if ($_POST) {
    $AuthorName = trim($_POST['Aname']);
    $AuthorName = mb_convert_case($AuthorName, MB_CASE_TITLE, "UTF-8");
    $AuthorName = mysqli_real_escape_string($connection, $AuthorName);
    $ERR = FALSE;

    if (mb_strlen($AuthorName) < 3) {
        echo '<p>Името на афтора е по-малък от 3 символа</p>';
        $ERR = TRUE;
    }

    $SQL = mysqli_query($connection, 'SELECT author_name FROM authors WHERE `author_name`="' . $AuthorName . '"');
    if (mysqli_fetch_assoc($SQL)) {
        echo 'Афторът вече съществува';
        $ERR = TRUE;
    }

    if (!$ERR) {
        $SQL_insert = mysqli_query($connection, 'INSERT INTO authors(`author_name`) VALUE ("' . $AuthorName . '")');
        if ($SQL_insert) {
            echo '<p>Записът е успешен</p>';
        } else {
            echo '<p>Записът е неуспешен</p>';
        }
    }
}
?>
<a href="index.php">Книги</a>
<form method="POST">
    <input type="text" name="Aname" placeholder="Име на афтор">
    <input type="submit" value="Добави">
</form>
<br><br>
<?php
echo '<table border="1"> <tr><td align="center">Афтори</td></tr>';
$SQl_view = mysqli_query($connection, 'SELECT * FROM authors');
while ($row = mysqli_fetch_assoc($SQl_view)) {
     echo '<tr><td><a href="index.php?author_ID='.$row['author_id'].'">'.$row['author_name'].'</a></td></tr>';
}

?>
<?php include 'includes/footer.php'; ?>