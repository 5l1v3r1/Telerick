<?php 
        if($_SESSION['isLogin']==TRUE)
        echo  '<p>'.'Здравей'.'   '.$_SESSION['UserName'].' '.'<a href="include/SesionDestroy.php">Изход</a>'.'</p>'; 
        else {  header('Location:index.php');  } 
 ?>
