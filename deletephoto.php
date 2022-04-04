<?php
    require "dbconnect.php";
//    try {
//        $sql = 'DELETE FROM photos WHERE photoId=:id';
//        $stmt = $conn->prepare($sql);
//        $stmt->bindValue(':id', $_GET['id']);
//        $stmt->execute();
//        $_SESSION['msg'] = "Фото успешно удалено";
//        // return generated id
//        // $id = $pdo->lastInsertId('id');
//    } catch (PDOexception $error) {
//        $_SESSION['msg'] = "Ошибка удаления фото: " . $error->getMessage();
//    }
    // перенаправление на главную страницу приложения

    try {
        $result = $conn->query("SELECT * FROM photos WHERE photoId=".$_GET['id']);
        $row = $result->fetch();
        try {
            $resource = Container::getFileUploader()->delete($row['path']);
        } catch (S3Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
        }
        $result = $conn->query("SELECT * FROM photos WHERE folderId=". $_GET['folderId']." AND photoId=".$_GET['id']);
        if ($result->rowCount() == 0) throw new PDOException('Фото не найдено', 1111 );
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



    header('Location: http://webphotoalbum/index.php?page=t&id='.$_GET['folderId']);
    exit( );


