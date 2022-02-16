<?php

require "dbconnect.php";

try {
    $sql = 'INSERT INTO category(name) values (:name)';
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name',$_GET['name']);
    $stmt->execute();
    echo ("Категория успешно создана");

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