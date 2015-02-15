<?php

if ( isset($_SESSION['IsUser'])&& $_SESSION['IsUser'] == TRUE) {
    echo 'Здравей '.$_SESSION['UserName'].' <a href="includes/SessDes.php">Изход</a><br> '; }
    else {      
        echo '<a href="index_vhod.php"> Вход </a>';

    }

?>
