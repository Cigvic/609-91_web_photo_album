<?php
    require "dbconnect.php";

    if ($file = fopen($_FILES['filename']['tmp_name'], 'r+')){
        //получение расширения
        $ext = explode('.', $_FILES["filename"]["name"]);
        $ext = $ext[count($ext) - 1];
        $filename = 'file' . rand(100000, 999999) . '.' . $ext;

        $resource = Container::getFileUploader()->store($file, $filename);
        $picture_url = $resource['ObjectURL'];
        echo $picture_url;
    }
    else{
        echo "No photo";
    }

    try {
        $sql = 'INSERT INTO photos(name,description,createdDate,folderId,path) VALUES(:name,"123",CURRENT_DATE,:folderId,:picture_url)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->bindValue(':folderId', $_POST['folderId']);
        $stmt->bindValue(':picture_url', $picture_url);
        $stmt->execute();
        $_SESSION['msg'] = "Фото успешно добавлено";
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления фото: " . $error->getMessage();
    }
    // перенаправление на главную страницу приложения
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit( );
