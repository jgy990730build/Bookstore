<?php
require ("conn.php");
session_start();
$user_name = $_POST["username"];
$pass_word = $_POST["password"];

try {

// 设置 PDO 错误模式，用于抛出异常
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT * FROM user where username ='$user_name' and password = '$pass_word'";
    $result=$conn->query($sql);
    if ($result->rowCount()==0){   //如果数据表中查不到对应的记录
        echo "warning";
    }
    else {
        while($row=$result->fetch(PDO::FETCH_ASSOC)) {
            $u_id = $row['id'];
        }

        $_SESSION['username']=$u_id;
        header("Location: index.php");
    }

}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

$conn = null;