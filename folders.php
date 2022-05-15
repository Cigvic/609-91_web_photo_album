<div class="container content">
<h1 style="align-text: center; margin-bottom: 15px;">Папки</h1>
<div class="flex-container flex-container_jc-sb">
<form class="add-folder-form" method="get" action="insertfolder.php">
    <h2>Добавить папку</h2>
    <input style="margin-bottom: 15px; margin-top: 15px" type="text" name="name" class="form-control" placeholder="Введите название папки">
    <input class="btn btn-primary" type="submit" value="Создать">
    <?php echo $msg; ?>
</form>
<section class="gallery" aria-label="Секция с папками">

<?php

$result = $conn->query("SELECT * FROM folder WHERE userId=".$_SESSION['userId']);
while ($row = $result->fetch()) {
    echo '<div class="folder">';
    echo '<a class="folder__link" href=index.php?page=t&id='.$row['folderId'].'>';
    echo '<svg class="folder__image" xmlns="http://www.w3.org/2000/svg"><path d="M7.05 40q-1.2 0-2.1-.925-.9-.925-.9-2.075V11q0-1.15.9-2.075Q5.85 8 7.05 8h14l3 3h17q1.15 0 2.075.925.925.925.925 2.075v23q0 1.15-.925 2.075Q42.2 40 41.05 40Zm0-29v26h34V14H22.8l-3-3H7.05Zm0 0v26Z"/></svg>';
    echo '<h2 class="folder__title">'.$row['name'].'</h2>';
    echo '</a>';
    echo '<a class="folder__trash-btn" href=deletefolder.php?id='.$row['folderId'].'><svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M15 39H33Q33 39 33 39Q33 39 33 39V15H15V39Q15 39 15 39Q15 39 15 39ZM10.5 11V8H17.2L19.2 6H28.8L30.8 8H37.5V11ZM15 42Q13.8 42 12.9 41.1Q12 40.2 12 39V12H36V39Q36 40.2 35.1 41.1Q34.2 42 33 42ZM15 39H33Q33 39 33 39Q33 39 33 39H15Q15 39 15 39Q15 39 15 39Z"/></svg></a>';
    echo '</div>';
}
?>
</section>
</div>
</div>
