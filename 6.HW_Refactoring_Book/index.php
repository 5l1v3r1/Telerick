<?php
include 'include_functions/include_functions.php';
include './inc/functions.php';

if (isset($_GET['author_id'])) {
    $author_id = (int) $_GET['author_id'];
    $q = mysqli_query($db, 'SELECT * FROM authors as a LEFT JOIN 
    books_authors as ba ON a.author_id=ba.author_id LEFT JOIN books as b
     ON b.book_id=ba.book_id WHERE a.author_id='.$author_id);
} else {
    $q = mysqli_query($db, 'SELECT * FROM books as b INNER JOIN 
    books_authors as ba ON b.book_id=ba.book_id INNER JOIN authors as a
     ON a.author_id=ba.author_id');
}


$result = [];
while ($row = mysqli_fetch_assoc($q)) {
    $result['book'][$row['book_id']]['book_title'] = $row['book_title'];
    $result['book'][$row['book_id']]['authors'][$row['author_id']] = $row['author_name'];
}

$result['title']='Списък';
$result['content']='./templates/index_authot_book.php'; 
index($result, './templates/leyaut/leyaut_index.php');



 