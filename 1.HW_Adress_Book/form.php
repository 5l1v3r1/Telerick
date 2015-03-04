<?php 
mb_internal_encoding('UTF-8'); 
$pageTitle='Форма'; 
include 'includes/head.php'; 
$error=FALSE;

if($_GET){
    
$name=trim($_GET['username']);
$sum=trim($_GET['suma']);
$vid=(int)$_GET['vid'];

if(mb_strlen($name)<3 || mb_strlen($name)>25){
   echo '<p>Името на разхода е прекалено късо</p>';
   $error=TRUE;
}
if (!is_numeric($sum)){
    echo '<p>Невалидна сума</p>';
    $error = TRUE;
   } 
   
if(!array_key_exists($vid, $group)){ 
    echo '<p>Невалидна група</p>';
    $error = TRUE;
    }
    
if(!$error){
    $today = date("F j, Y, g:i a");
    $AllResult=$today.'!'.$name.'!'.$sum.'!'.$vid."\n";
    
if(file_put_contents('All.txt', $AllResult, FILE_APPEND)){ 
    echo '<p>Записът е успешен</p>'; }
 }
 } ?>




<table> 
    <tr>
        <td colspan="2">
            <a style="font-size:25px " HREF="index.php">Списък с всички разходи</a></td> <td></td>
            </tr>
    <tr>
       <td >
           <form action="form.php" method="GET">
             Име на разхода:</td> <td> <input type="text" name="username"></td>
            </tr>
    <tr>     
      <td>   Сума: </td> <td> <input type="text" name="suma"> </td>
           </tr>
    <tr>
       <td>
             Тип </td> <td> <select  name="vid">
              <option value="folse">Молч изберете категория</option> 
              <?php include 'includes/Select.php';         ?>
             </select> </td>
       </tr>
  <tr>
       <td><input type="submit" value="Добави"></td>
</form> </tr>
</table>

<?php include 'includes/footer.php'; ?>