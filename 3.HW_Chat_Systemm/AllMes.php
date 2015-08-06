<?php
$Title = 'Съобщения';
include '/include/header.php';
include 'include/IsUser.php';
include 'include/SQLconnect.php';
?>
<div ID="header"> 
    <a href="AddText.php">Добави ново съобщение</a>
    <form method="POST">
        <select name="sort">        
            <option >-----------------</option>
            <option value="DESC">Низходящ</option>
            <option value="ASC">Възходящ</option>
        </select> 
        <input type="submit" value="Сортирай"> 
    </form>

</div>
<div ID="mesL"></div>
<div ID="Messige">

    <?php
    if (isset($_POST['sort'])&&$_POST['sort']==TRUE) {
        $sort = $_POST['sort'];
        $sort = mysqli_real_escape_string($connection, $sort);
    } else {
        $sort = 'DESC';
    }

    $sql = 'SELECT * FROM message ORDER BY date ' . $sort;
    $Mess_row = mysqli_query($connection, $sql);
    while ($row = $Mess_row->fetch_assoc()) {
        echo '<h1>' . $row['Mess_Title'] . '</h1>';
        echo '<div><p class="smal">Добавето от <em>' . $row['user'] . '</em>' . ' На ' . $row['date'] . '</p></div>';
        echo '<div><p class="messige">' . $row['message'] . '</div></p>';
        echo '<hr>';
    }
    ?>
</div>
<div ID="mesR"></div>
<?php include '/include/footer.php'; ?>
