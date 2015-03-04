<?php $pageTitle='Списък'; ?>
<?php include 'includes/head.php'; ?>
   
<div style="padding-left:37%"><a style="font-size:35px " HREF="form.php">Добави нов разход</a></div>

<div style="padding-left:40% "> <form action="index.php" method="GET"> 
        <select name="sort">
        <option value="">Всички</option>
        <?php include 'includes/Select.php';  ?>
        </select>
        <input type="Submit" value="Сортирай"> 
 </form> </div>


<table  border="1"  align="center">
    <tr> 
        <td>Дата</td> 
        <td>Име</td>
        <td>Сума</td> 
        <td>Вид</td>
    </tr>
    <?php  
    $all_Sum=0;
    if(file_exists('All.txt')){
        $Result_On_File=file('All.txt');
           foreach ($Result_On_File as $value){
              $Array_TXT=explode('!', $value);
               if(isset($_GET['sort']) && $_GET['sort']==TRUE){
                  if($_GET['sort'] == trim($Array_TXT[3])){
                      include 'includes/Sor_code.php';
                  }
                }
              else { include 'includes/Sor_code.php'; }
        }
        echo '<tr>
              <td colspan="2">Сума от Всички разходи</td>      
              <td>'.$all_Sum.'</td>
              <td></td>
              </tr>';
    }
    
     ?>
    
 </table>
<?php include 'includes/footer.php'; ?>