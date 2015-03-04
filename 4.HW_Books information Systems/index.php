<?php
$title = 'Всички книги';
include 'includes/head.php';
include 'includes/SQL_DB.php';
?>
<a href="index.php">Книги</a>
<a href="new_authors.php">Нов афтор</a>
<a href="new_books.php">Нова книга</a>
<br><br>
<?php
if (isset($_GET['author_ID'])) {
    
    $all_SQL = mysqli_query($connection, 'SELECT * FROM books_authors as ba INNER JOIN books as b ON ba.book_id=b.book_id INNER JOIN books_authors bba ON bba.book_id=ba.book_id INNER join authors as a ON bba.author_id=a.author_id where ba.author_id='.mysqli_real_escape_string($connection,$_GET['author_ID']));       
    
} else {
    $all_SQL = mysqli_query($connection, 'SELECT * FROM  books LEFT JOIN books_authors ON books.book_id=books_authors.book_id  LEFT JOIN authors ON authors.author_id=books_authors.author_id');
}
$all_result = array();

while ($row = mysqli_fetch_assoc($all_SQL)) {
    $all_result[$row['book_id']]['book_title'] = $row['book_title'];
    $all_result[$row['book_id']]['book_author'][] [$row['author_name']]['ID'] = $row['author_id'];
}
echo '<table border="1"><tr><td>Име на книгата</td><td>Афтор</td></tr>';
foreach ($all_result as $key => $value) {
    echo '<tr><td>' . $value['book_title'] . '</td><td>';
    $data = array();
    foreach ($value['book_author'] as $key2 => $value2) {

        foreach ($value2 as $key3 => $value3) {
            $data[] = '<a href="index.php?author_ID=' . $value3['ID'] . '">' . $key3 . '</a>';
        }
    }
    echo implode(',', $data);
    echo '</td></tr>';
}
echo '</table>';
?>



<?php include 'includes/footer.php'; ?>
