<?php
    require "dbconnect.php";
    try {
        $sql = 'DELETE FROM photos WHERE photoId=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $_SESSION['msg'] = "Фото успешно удалено";
        // return generated id
        // $id = $pdo->lastInsertId('id');
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка удаления фото: " . $error->getMessage();
    }
    // перенаправление на главную страницу приложения
    header('Location: http://webphotoalbum/photos.php?id='.$_GET['folderId']);
    exit( );


