<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?= $result['title'] ?></title>
    </head>
    <body>
        <div>    <a href="authors.php">Автори</a>
            <a href="add_book.php">Нова книга</a> </div>
        <div>  <?php include $result['content']; ?></div>
    </body>
</html>