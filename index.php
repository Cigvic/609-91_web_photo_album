
<?php

use Framework\Request;
use Framework\Router;
use Framework\Application;

date_default_timezone_set('Asia/Yekaterinburg');
if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

$request = new Request();
Application::init();
echo (new Router($request))->getContent();

exit();

require "dbconnect.php";

require "auth.php";
require "menu.php";
echo '<main class="container" style="margin-top: 100px">';

//<?php
//date_default_timezone_set('Asia/Yekaterinburg');
//require "dbconnect.php";
//require "auth.php";
//require "menu.php";
//switch ($_GET['page']){
//    case 'c':
//        if (isset($_SESSION['login'])){
//            require "folders.php";
//        }
//
//        break;
//    case 't':
//        if (isset($_SESSION['login'])){
//            require "photos.php";
//        }
//        else{
//            echo 'Войдите в сиситему для просмотра фото';
//        }
//        break;
//    case 'reg':
//        if (!isset($_SESSION['login'])){
//            require "registration.php";
//        }
//        break;
//}
//
//require "message.php";
//$_SESSION['msg'] = '';
//
//
//