<?php $Title='Качени файлове'; 
        include '/include/header.php'; 
        include 'include/IsUser.php' ?>

<p><a HREF="uploud.php" style="font-size:25px">Качи файл</a></p>
<table border="1"> <tr>
        <td style="text-align:center">Име на файла</td>    
        <td style="text-align:center">Размер</td>
        </tr> 
            
<?php $directory=scandir('UserUploudFile');        
 foreach ($directory as $key=>$value) {
     echo '<tr>';
     if($key>1){ 
     $files='UserUploudFile/'.$value;    
     echo '<td><a href="UserUploudFile/'.$value.'">'.$value.'</a></td>';
        if(((filesize($files))/1024)<1024){
            echo '<td>'.number_format(((filesize($files))/1024),3,'.','').' '.'KB'.'<br></td>';}
                else { echo '<td>'.  number_format(((filesize($files))/(1024*1024)),3,'.','').' '.'MB'.'<br><td>'; }
     }
     echo '</tr>';
}
 ?> 
</table>
<?php  include '/include/footer.php';?>
