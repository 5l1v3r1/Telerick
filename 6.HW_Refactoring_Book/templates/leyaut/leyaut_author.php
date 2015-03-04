<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?= $result['title'] ?></title>
    </head>
    <body>

        <div> <a href="index.php">Списък</a>
            <a href="add_book.php">Нова книга</a></div>

        <div>   <form method="post" action="authors.php">
                Име: <input type="text" name="author_name" />
                <input type="submit" value="Добави" />    
            </form></div>

        <div> <?php include $result['Er']; ?></div>
        <div> <?php include $result['author_view']; ?></div>


    </body>
</html>