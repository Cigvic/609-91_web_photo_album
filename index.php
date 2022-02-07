<?php
require __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;
if (file_exists(__DIR__."/.env"))
{
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}
try {
    $conn = new PDO("mysql:host=$_ENV[servername];dbname=$_ENV[database]", $_ENV['username'], $_ENV['password']);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


echo ("<table border='1'>");
$result = $conn->query("SELECT * FROM category");
while ($row = $result->fetch())
{
    echo '<tr>';
    echo '<td>' . $row['id'].'</td><td>'.$row['name'].'</td>';
    echo '</tr>';
}


?>