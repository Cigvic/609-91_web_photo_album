<h1>Папки:</h1>
<table border='1'>
<?php
//echo $_SESSION['userId'];
$result = $conn->query("SELECT * FROM folder WHERE userId=".$_SESSION['userId']);
//$stmt = $conn->prepare($sql);
//$stmt->bindValue(':userId', $_SESSION['userId']);
//$stmt->execute();
while ($row = $result->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['folderId'] . '</td>';
    echo '<td><a href=photos.php?id='.$row['folderId'].'>'.$row['name'].'</a></td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td><a href=deletefolder.php?id='.$row['folderId'].'>Удалить</a></td>';
    echo '</tr>';
}
?>
</table>
<h2>Добавление папки</h2>
<form method="get" action="insertfolder.php">
    <input type="text" name="name">
    <input type="submit" value="Создать">
</form>