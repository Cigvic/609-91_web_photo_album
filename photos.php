<?php
require "dbconnect.php";
$result = $conn->query("SELECT userId FROM folder WHERE folderId=".$_GET['id']);
$row = $result->fetch();
if ($row['userId']==$_SESSION['userId'])
{   echo '<div class="container content">';
    echo '<h1 style="align-text: center; margin-bottom: 15px;">Фотографии</h1>';
    echo '<div class="flex-container flex-container_jc-sb">';
    echo '<form class="add-folder-form" method="post" action="insertphoto.php" enctype="multipart/form-data">';
    echo '<h2>Добавить фото</h2>';    
    echo '<input style="width: 80%; margin-top: 15px;" type="text" name="name" class="form-control" placeholder="Название фото">';
    echo '<input type="hidden" value='.$_GET['id'].' name="folderId"</input>';
    echo '<input type="file" name="filename" style="display:block; margin-bottom: 15px; margin-top: 15px">';
    echo '<input class="btn btn-primary" type="submit" value="Добавить">
    </form>';
    echo '<section class="gallery" aria-label="Секция с папками">';
    $result = $conn->query("SELECT * FROM photos WHERE folderId=".$_GET['id']);
    while ($row = $result->fetch()) {
        echo '<div class="photo-card">';
        echo '<img src="'.$row['path'].'" alt="' . $row['name'] . '" class="photo-card__image">';
        echo '<h2 class="photo-card__title">' . $row['name'] . '</h2>';
        echo '<a class="photo-card__trash-btn" href=deletephoto.php?id='.$row['photoId'].'&folderId='.$_GET['id'].'></a>';
        echo '</div>';
    }
    echo'</section>
        </div>
        </div>';
}
else
{
    echo "Нельзя получить доступ к чужим папкам";
}
?>