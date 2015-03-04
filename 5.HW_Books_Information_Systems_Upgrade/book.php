<?php
$title = 'Всички книги';
include 'includes/head.php';
include 'includes/SQL_DB.php';
include 'includes/Iss_User.php';
?>
<a href="index.php">Начало</a>
<hr>
<?php
//+++++++++++++++++++++++++Сортиране на книгата и афтор++++++++++++++++++++++++++++++++++
if (isset($_GET['book_ID'])) {
    $Book_ID = trim($_GET['book_ID']);
    $book_SQL = mysqli_query($connection, 'SELECT * FROM `books`LEFT JOIN books_authors ON 
books.book_id=books_authors.book_id LEFT JOIN authors on authors.author_id=books_authors.author_id  WHERE books.book_id=' . $Book_ID);
    if (!mysqli_error($connection)) {
        if (mysqli_num_rows($book_SQL) >= 1) {
            $Book_array = [];
            while ($row = mysqli_fetch_assoc($book_SQL)) {
                $Book_array[$row['book_id']]['book_title'] = $row['book_title'];
                $Book_array[$row['book_id']]['book_author'][] = $row['author_name'];
            }
            echo '<center><table border="1"><tr><td>Име на книгата</td><td>Афтори</td>';
            foreach ($Book_array as $value) {
                echo '<tr><td>' . $value['book_title'] . '</td><td>';
                $book_imp = [];
                foreach ($value['book_author'] as $val) {
                    $book_imp[] = $val;
                }
                echo implode(',', $book_imp);
                echo '</td><tr></table><center>';
            }
        }
    } else {
        echo '<p>Data_B ERROR</p>';
    }
} else {
    header('Location:index.php');
}
//----------------------------------КРАЙ СОРТИРОФКА------------------------------------
?>
 
<?php
//+++++++++++++++++++++++++++++++++КОД ЗА ЗАПИС НА СЪОБЩЕНИЕ +++++++++++++++++++++++++++++++++
if (isset($_GET['text'])) {

    $text = trim($_GET['text']);
    $text = mysqli_real_escape_string($connection, $text);
    $greshka = FALSE;

    if (mb_strlen($text) < 10) {
        echo'<p>Молч въведете текст по гомям от 10 символа</p>';
        $greshka = TRUE;
    } elseif (mb_strlen($text) > 300) {
        echo '<p>Превишили сте максималният брой символи в текста "300"</p>';
        $greshka = TRUE;
    }

    if (!$greshka) {
        $date = date("Y-m-d G:i:s");
        $AddTxt = 'INSERT INTO message VALUE (0,' . $_SESSION['UserID'] . ',' . $Book_ID . ',"' . $text . '","' . $date . '")';
        if (mysqli_query($connection, $AddTxt)) {
            //echo 'Записът е успешен';
        } else {
            echo '<p><b>Неуспешен запис</b></p>';
        }
    }
}
//––––––––––––––––––––––––––––––––– КРАЙ НА КОДА ЗА ЗАПИС ----------------------------------
?>
<?php
//+++++++++++++++++++++++++++++ИЗВЕЖДАНЕ НА СЪОБЩЕНИЯТА++++++++++++++++++++++++++++++++++++
echo '<br><br>';
$All_Message=  mysqli_query($connection, 'SELECT message,date ,user  FROM message INNER JOIN user ON
message.user_id=user.user_id INNER JOIN books ON
books.book_id=message.book_id WHERE 
message.book_id='.mysqli_real_escape_string($connection,$_GET['book_ID']).' ORDER BY message.date DESC');
if(!mysqli_num_rows($All_Message)<1){
    while ($row1 = mysqli_fetch_assoc($All_Message)) {
        echo '<em STYLE="text-decoration:underline;" >Добавено от '.$row1['user']. ' на  '.$row1['date'].' </em>';
        echo '<p STYLE="font-style:oblig; color:blue;" >'.$row1['message'].'</p>';
        //echo '<hr>';
        
    }
}
else{echo '<p><b>Все още няма коментар по книгата</b></p>';}
//--------------------------КРАЙ НА СЪОБЩЕНИЯТА---------------------------------------------
?>
<?php
//+++++++++++++++++++++++++++++++++ФОРМУЛЯР ЗА КОМЕНТИРАНЕ +++++++++++++++++++++++++++++++++
if (isset($_SESSION['IsUser']) && $_SESSION['IsUser'] == TRUE) {
    echo '<br><div><form action="" method="GET" >
  <div>Коментар:<br><textarea name="text" cols="50" rows="7" placeholder="ТЕКСТ"></textarea></div>
  <input type="hidden"  name="book_ID" value=' . $_GET['book_ID'] . '>' . '
  <input type="submit" value="Коментирай">
</form></duv>';
}
else { echo '<p><b>За да коментирате моля влезте в системата</b></p>'; }
//----------------------------- КРАЙ НА ФОРМУЛЧРА ЗА РЕГИСТРАЦИЯ-------------------------
?>


<?php include 'includes/footer.php'; ?>
