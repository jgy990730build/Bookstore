<?php
require ("conn.php");
session_start();
    $b_id = $_POST['book_id'];
    $u_id = $_SESSION['username'];
    if(empty($_SESSION['username'])){
        header("Location: login.php");
    }else{
// 设置 PDO 错误模式，用于抛出异常
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM book where b_id ='$b_id' ";
        $result=$conn->query($sql);
        if ($result->rowCount()==0){   //如果数据表中查不到对应的记录
            echo "warning";
        }
        else {
            while($row=$result->fetch(PDO::FETCH_ASSOC)) {
                $img=$row['book_img'];
                $name=$row['bookname'];
                $price=$row['rush_price'];
            }
            // 设置 PDO 错误模式，用于抛出异常
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // 预处理 SQL 并绑定参数
            $stmt = $conn->prepare("INSERT INTO shopcar(u_id, s_img,s_name, s_price) 
    VALUES (:u_id, :s_img,:s_name,:s_price)");
            $stmt->bindParam(':u_id', $u_id);
            $stmt->bindParam(':s_img', $img);
            $stmt->bindParam(':s_name', $name);
            $stmt->bindParam(':s_price', $price);
            $stmt->execute();
        }
        header("Location: shoppinglist.php");
        $conn = null;
    }
