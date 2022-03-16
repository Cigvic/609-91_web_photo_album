<h1>Фото:</h1>
<table border='1'>
<?php
$result = $conn->query("SELECT * FROM photos");
while ($row = $result->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['photoId'] . '</td><td>' . $row['name'] . '</td>';
    echo '<td><a href=deletephoto.php?id='.$row['photoId'].'>Удалить</a></td>';
    echo '</tr>';
}
?>
</table>
<h2>Добавление фото</h2>
<form method="get" action="insertphoto.php">
    <input type="text" name="name">
    <input type="submit" value="Создать">
</form>