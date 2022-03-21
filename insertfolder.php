<?php
    require "dbconnect.php";
    try {
        $sql = 'INSERT INTO folder(name,userId,createdDate) VALUES(:name,:userId,CURRENT_DATE)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':userId', $_SESSION['userId']);
        $stmt->bindValue(':name', $_GET['name']);
        $stmt->execute();
        $_SESSION['msg'] = "Папка успешно добавлена";
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления папки: " . $error->getMessage();
    }
    // перенаправление на главную страницу приложения
    header('Location: http://webphotoalbum/index.php?page=c');
    exit( );
