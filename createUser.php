<?php
require "dbconnect.php";
if ($_POST['password']==$_POST['repPassword'])
{
try {

        $sql = 'INSERT INTO user(firstname,lastname,login,md5password) VALUES(:firstname,:lastname,:login,:password)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':login', $_POST['login']);
        $stmt->bindValue(':firstname', $_POST['firstname']);
        $stmt->bindValue(':lastname', $_POST['lastname']);
        $stmt->bindValue(':password', MD5($_POST['password']));

        $stmt->execute();
        $_SESSION['msg'] = "Успешно";


    // return generated id
    // $id = $pdo->lastInsertId('id');

} catch (PDOexception $error) {
    $_SESSION['msg'] = "Пароли не совпадают: " . $error->getMessage();
    header('Location: http://webphotoalbum/index.php?page=c');
}

    exit( );
}
else {
    $_SESSION['msg'] = "Пароли не совпадают ";
    header('Location: http://webphotoalbum/index.php?page=reg');
    exit( );
}
// перенаправление на главную страницу приложения

