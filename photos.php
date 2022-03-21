<h1>Фото:</h1>
<table border='1'>
<?php
require "dbconnect.php";
$result = $conn->query("SELECT userId FROM folder WHERE folderId=".$_GET['id']);
$row = $result->fetch();
if ($row['userId']==$_GET['id'])
{
    $result = $conn->query("SELECT * FROM photos WHERE folderId=".$_GET['id']);
    while ($row = $result->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['photoId'] . '</td><td>' . $row['name'] . '</td>';
        echo '<td><a href=deletephoto.php?id='.$row['photoId'].'&folderId='.$_GET['id'].'>Удалить</a></td>';
        echo '</tr>';
    }

    echo '</table>
<h2>Добавление фото</h2>
<form method="get" action="insertphoto.php">
    <input type="text" name="name">';
    echo '<input type="hidden" value='.$_GET['id'].' name="folderId"</input>';
    echo '<input type="submit" value="Создать">
</form>';
}
else
{
    echo "Нельзя получить доступ к чужим папкам";
}
?>