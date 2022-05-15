<?php
    require "dbconnect.php";
    try {
        $sql = 'DELETE FROM folder WHERE folderId=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $_SESSION['msg'] = "Папка успешно удалена";
        // return generated id
        // $id = $pdo->lastInsertId('id');
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка удаления папки: " . $error->getMessage();
    }
    // перенаправление на главную страницу приложения
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit( );


