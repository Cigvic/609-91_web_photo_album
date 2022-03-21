<?php
date_default_timezone_set('Asia/Yekaterinburg');
require "dbconnect.php";
require "auth.php";
require "menu.php";
switch ($_GET['page']){
    case 'c':
        if (isset($_SESSION['login'])){
            require "folders.php";
        }

        break;
    case 't':
        if (isset($_SESSION['login'])){
            require "photos.php";
        }
        else{
            echo 'Войдите в сиситему для просмотра папок и фото';
        }
        break;
}

require "message.php";
$_SESSION['msg'] = '';


?>