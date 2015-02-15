<?php $Title='Вход'; ?>
<?php include '/include/header.php'; ?>
<?php 
if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==TRUE){
    // echo"Здравей";
    header('Location:uploud_view.php');
}
 else {
     
    if($_POST){
        
    $Erors=FALSE;   
    $UserName=trim($_POST['UserName']);
    $pass=trim($_POST['pass']);

if(mb_strlen($pass)<4) {
   echo "<p>Паролата ви е прекалено къса!</p>";
   $Errors=TRUE; }
    
if(mb_strlen($UserName)>15 || mb_strlen($UserName)<3 || !preg_match('@[A-Za-z0-9А-Яа-я]@', $UserName) )
                {
   echo'<p>Грешка в потребителското име!</p>'; 
   $Errors=TRUE; }     
    
    if($UserName=='user' && $pass=='qwerty'){
    $_SESSION['isLogin']=TRUE;
    $_SESSION['UserName']=$UserName;
    header('Location:index.php');
    exit;
    }
       else{ echo '<p>Грешно потребителско име и парола!</p>'; }
    }
    echo'<div><form action="index.php" method="POST">
        <div>Име:<input type="text" name="UserName"></div>
        <div>Парола:<input type="password" name="pass"></div>
        <div><input type="submit" value="OK"> </div>
        </form></div>';
      }
?>


<?php include '/include/footer.php'; ?>

     
     
     
