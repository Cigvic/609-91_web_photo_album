<?php
    require "dbconnect.php";
    try {
        $sql = 'INSERT INTO photos(name,description,createdDate,folderId,path) VALUES(:name,"123",CURRENT_DATE,1,"/asdsa")';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $_GET['name']);
        $stmt->execute();
        echo ("Фото успешно добавлена");
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        echo ("Ошибка добавления фото: " . $error->getMessage());
    }
    // перенаправление на главную страницу приложения
    header('Location: http://webphotoalbum');
    exit( );
