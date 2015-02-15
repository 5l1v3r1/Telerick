<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?= $result['title'] ?></title>
    </head>
    <body>
        <div> <a href="index.php">Списък</a></div>
        <div><?php include $result['authors_URL']; ?></div>
        <div><?php include $result['error_URL']; ?></div>

    </body>
</html>