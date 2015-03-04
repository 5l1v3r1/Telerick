<?php $Title='Формулър за качване на файлове'; 
        include '/include/header.php'; 
        include 'include/IsUser.php' ?>

<p><a HREF="uploud_view.php" style="font-size:25px">Виш качените файлове</a></p>

<?php 
    if(isset($_POST)){
      if(isset($_FILES['file']) && count($_FILES['file']>0 )){
         if(move_uploaded_file($_FILES['file']['tmp_name'], 'UserUploudFile'.DIRECTORY_SEPARATOR.$_FILES['file']['name']) ) {
           echo"<p>Файлът е качен успещно</p>";  
         } 
         else {  echo "<p>Възникна проблем при качването на файла</p> ";}
         }  
         }
         ?>

<form method="POST" enctype="multipart/form-data" >
   Файл:<input type="file" name="file"><br>
        <input type="submit" value="Качи">
</form>
            

<?php  include '/include/footer.php';?>
