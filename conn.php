<?php
$servername="localhost:3306";
$username="root";
$password="123456";
$dbname="php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    echo "连接成功";
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
