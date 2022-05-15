<?php
require "dbconnect.php";
$result = $conn->query("SELECT * FROM user");
while ($row = $result->fetch()) {
    if ($row['login']===$_POST['login'])
    { $_SESSION['msg'] = "Логин занят ";
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit( );}


}
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
    header("Location: ".$_SERVER['HTTP_REFERER']);
}
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit( );
}
else {
    $_SESSION['msg'] = "Пароли не совпадают ";
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit( );
}
// перенаправление на главную страницу приложения

