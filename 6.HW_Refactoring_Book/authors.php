<?php
include './include_functions/include_functions.php';
include './inc/functions.php';
?>

<?php
$Err=array();
if ($_POST) {
    $author_name = trim($_POST['author_name']);
    if (mb_strlen($author_name) < 2) {
        $Err[]='<p>Невалидно име</p>';
    } else {
        $author_esc = mysqli_real_escape_string($db, $author_name);
        $q = mysqli_query($db, 'SELECT * FROM authors WHERE
        author_name="' . $author_esc . '"');
        if (mysqli_error($db)) {
            $Err[]='Грешка';
        }

        if (mysqli_num_rows($q) > 0) {
           $Err[]='Има такъв автор';
        } else {
            mysqli_query($db, 'INSERT INTO authors (author_name)
            VALUES("' . $author_esc . '")');
            if (mysqli_error($db)) {
                $Err[]='Грешка';
            } else {
                $Err[]='Успешен запис';
            }
        }
    }
}
$authors = getAuthors($db);
if ($authors===false) {
    $Err[]='Грешка';
}

?>

<?php
    $result['Error']=$Err;
    $result['authors']=$authors;
    
    $result['title']='Автори';
    $result['author_view']='./templates/author_view.php';
    $result['Er']='./templates/author_error.php'; 
    index($result, './templates/leyaut/leyaut_author.php');
            
?>
 
