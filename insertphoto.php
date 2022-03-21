<?php
    require "dbconnect.php";
    echo $_GET['folderId'];
    echo $_GET['name'];
    try {
        $sql = 'INSERT INTO photos(name,description,createdDate,folderId,path) VALUES(:name,"123",CURRENT_DATE,:folderId,"/asdsa")';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $_GET['name']);
        $stmt->bindValue(':folderId', $_GET['folderId']);
        $stmt->execute();
        $_SESSION['msg'] = "Фото успешно добавлена";
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления фото: " . $error->getMessage();
    }
    // перенаправление на главную страницу приложения
    header('Location: http://webphotoalbum/photos.php?id='.$_GET['folderId']);
    exit( );
