<div class="container" >
<h1 style="margin-top: 70px">Фото:</h1>
<div >
    <table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Фото</th>
        <th scope="col">Действие</th>
    </tr>
    </thead>
<?php
require "dbconnect.php";
$result = $conn->query("SELECT userId FROM folder WHERE folderId=".$_GET['id']);
$row = $result->fetch();
if ($row['userId']==$_SESSION['userId'])
{
    $result = $conn->query("SELECT * FROM photos WHERE folderId=".$_GET['id']);
    while ($row = $result->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['photoId'] . '</td><td>' . $row['name'] . '</td><td><img style="width: 160;height: 90" src="'.$row['path'].'" alt="Нет картинки"></td>' ;
        echo '<td><a href=deletephoto.php?id='.$row['photoId'].'&folderId='.$_GET['id'].'>Удалить</a></td>';
        echo '</tr>';
    }

    echo '</table>
</div>
    <div >
<h2>Добавление фото</h2>
<form method="post" action="insertphoto.php" enctype="multipart/form-data">
    <input style="width: 20%; margin-bottom: 15px; margin-top: 15px" type="text" name="name" class="form-control">';
    echo '<input type="hidden" value='.$_GET['id'].' name="folderId"</input>';
    echo '<input type="file" name="filename">';
    echo '<input class="btn btn-primary" type="submit" value="Создать">';
'</form>
    </div>
</div>';
}
else
{
    echo "Нельзя получить доступ к чужим папкам";
}
?>