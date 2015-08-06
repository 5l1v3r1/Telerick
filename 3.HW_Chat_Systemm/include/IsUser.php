<?php 
        if($_SESSION['isLogin']==TRUE)
        echo  '<div ID=UserInfo><p>'.'Здравей'.'   '.$_SESSION['UserName'].' '.'<a href="include/SesionDestroy.php">Изход</a>'.'</p></div>'; 
        else {  header('Location:index.php');  } 
 ?>
