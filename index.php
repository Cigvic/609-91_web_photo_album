<?php

require "dbconnect.php";


echo ("<table border='1'>");
$result = $conn->query("SELECT * FROM category");
while ($row = $result->fetch())
{
    echo '<tr>';
    echo '<td>' . $row['id'].'</td><td>'.$row['name'].'</td>';
    echo '</tr>';
}


?>