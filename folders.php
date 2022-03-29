<div class="container" style="margin: 0 auto ">
<h1  style="margin-top: 50px">Папки:</h1>
<div >
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Действие</th>
    </tr>
    </thead>
<?php
//echo $_SESSION['userId'];
$result = $conn->query("SELECT * FROM folder WHERE userId=".$_SESSION['userId']);
//$stmt = $conn->prepare($sql);
//$stmt->bindValue(':userId', $_SESSION['userId']);
//$stmt->execute();
while ($row = $result->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['folderId'] . '</td>';
    echo '<td><a href=index.php?page=t&id='.$row['folderId'].'>'.$row['name'].'</a></td>';
    echo '<td><a href=deletefolder.php?id='.$row['folderId'].'>Удалить</a></td>';
    echo '</tr>';

  echo '</tbody>';
}
?>
</table>
</div>
<h2>Добавление папки</h2>
<form method="get" action="insertfolder.php">
    <input style="width: 20%; margin-bottom: 15px; margin-top: 15px" type="text" name="name" class="form-control">
    <input class="btn btn-primary" type="submit" value="Создать">
</form>
</div>