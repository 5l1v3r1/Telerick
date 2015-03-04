<?php
$title = 'Нова книга';
include 'includes/head.php';
include 'includes/SQL_DB.php';
include 'includes/Iss_User.php';
?>
<div><a href="index.php">Книги</a></div><br>
<?php
if ($_GET) {
    $BookName = ucfirst(trim($_GET['BookName']));
    $BookName = mysqli_real_escape_string($connection, $BookName);
    $ER = array();

    if (mb_strlen($BookName) < 3) {
        $ER['1'] = '<p>Името е прекалено късо<p>';
    }

    if (!isset($_GET['select']) || !is_array($_GET['select'])) {
        $ER['2'] = '<p>Не сте избрали афтор </p>';
    }

    if (isset($_GET['select'])) {
        foreach ($_GET['select'] as $value) {
            $ID_is_valid = mysqli_query($connection, 'SELECT * FROM authors WHERE author_id="' . mysqli_real_escape_string($connection, $value) . '"');
            if (!mysqli_fetch_assoc($ID_is_valid)) {
                $ER['3'] = '<p>Избраният афтор е невалиден</p>';
            };
        }
    }
    
    if (count($ER) > 0) {
        foreach ($ER as $value) {
            echo $value;
        }
    } else {
        $BookSQL = mysqli_query($connection, 'INSERT INTO books (book_title) value ("' . $BookName . '")');
        if (mysqli_error($connection)) {
            echo '<p>Записът е неуспешен</p>';
        } else {
            $Book_ID_Numa = mysqli_insert_id($connection);
            echo 'Book_ID->' . $Book_ID_Numa;
            foreach ($_GET['select'] as $val) {
                $Author_SQL = mysqli_query($connection, 'INSERT INTO books_authors VALUE 
                         ("' . $Book_ID_Numa . '","' . mysqli_real_escape_string($connection, $val) . '")');
            }
        }
        echo '<p><b>Записът е успешен</b></p>';
    }
}
?>

<?php
echo
'<form method="GET"> 
    <div><input type="text" name="BookName" placeholder="Име на книга"> 
    <input type="submit" value="Добави"><br><br>
    <select multiple name="select[]">';
$SQl_view = mysqli_query($connection, 'SELECT * FROM authors');
while ($row = mysqli_fetch_assoc($SQl_view)) {
    echo '<option value="' . $row['author_id'] . '">' . $row['author_name'] . '</option>';
}

echo '</form>';
?>

<?php include 'includes/footer.php'; ?>