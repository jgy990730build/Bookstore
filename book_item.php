<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/mycss.css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
require ("conn.php");
error_reporting(E_ALL & ~E_NOTICE);
$b_id = $_GET['b_id'];
$query = "select * from book where b_id = '$b_id'";
$result = $conn ->prepare($query);
$result->execute();
?>

<?php
$query2 = "select * from categry";
$res = $conn ->prepare($query2);
$res->execute();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">在线图书商城系统</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">首页 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    图书分类
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php while ($r2=$res->fetch(PDO::FETCH_ASSOC)){?>
                        <a class="dropdown-item" href="categry.php?c_id=<?php echo $r2['c_id'];?>"><?php echo $r2['categry'];?></a>
                    <?php }?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="categry.php">进口原版</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="feedback.php">联系我们</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="help.php">帮助中心</a>
            </li>
            <li class="nav-item">
                <?php
                if($_SESSION['username']==null){
                    echo ' <a class="nav-link" href="login.php">我的账号</a>';

                }else{
                    echo ' <a class="nav-link" href="shoppinglist.php">购物车</a>';
                }
                ?>

            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
        </form>
    </div>
</nav>
<?php while ($res=$result->fetch(PDO::FETCH_ASSOC)){?>
<div class="container offset-2">
    <div class="row bottom_add">
        <div class="col-4">
            <img src="./image/<?php echo $res['book_img'];?>" class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-4">
            <h3>图书基本信息</h3>
            <table class="table">
                <tr>
                    <td>书名</td>
                    <td><?php echo $res['bookname'];?></td>
                </tr>
                <tr>
                    <td>作者</td>
                    <td><?php echo $res['author'];?></td>
                </tr>
                <tr>
                    <td>出版社</td>
                    <td><?php echo $res['press'];?></td>
                </tr>
                <tr>
                    <td>出版时间（版次)</td>
                    <td><?php echo $res['publish'];?></td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td><?php echo $res['ISBN'];?></td>
                </tr>
                <tr>
                    <td>页数</td>
                    <td><?php echo $res['pages'];?></td>
                </tr>
                <tr>
                    <td>定价</td>
                    <td>
                        <del>￥<?php echo $res['price'];?></del>
                        <strong class="text-danger">￥<?php echo $res['rush_price'];?></strong>
                    </td>
                </tr>
            </table>
            <form action="ShoppingSerivce.php" method="post">
                <input type="hidden" name="book_id" value="<?php echo $res['b_id'];?>"/>
                <input type="submit" value="加入购物车" class="btn btn-primary btn-block" />
            </form>
        </div>
        <div class="col-4">
            <h2>图书类型</h2>
            <div class="list-group">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#">文学</a>
                    <a class="nav-link" href="#">小说</a>
                    <a class="nav-link" href="#">图画</a>
                </nav>
            </div>
            <h2>十大推荐书</h2>
            <div class="list-group">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#">文学</a>
                    <a class="nav-link" href="#">小说</a>
                    <a class="nav-link" href="#">图画</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="row bottom_add">
        <div class="col-8">
            <h3>图书详情</h3>
            <hr>
            <?php echo $res['synopsis'];?>
        </div>
    </div>
</div>

<?php
}
$conn = null;
?>

<section class="footer">
    <h2 class="text-center">THANKS FOR VISITING US</h2>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 footer-left">
                <h4>Contact Information</h4>
                <div class="contact-info">
                    <div class="address">
                        <i class="glyphicon glyphicon-globe"></i>
                        <p class="p3">77 Jack Street</p>
                        <p class="p3">Chicago, USA</p>
                    </div>
                    <div class="phone">
                        <i class="glyphicon glyphicon-phone-alt"></i>
                        <p class="p4">+00 1010101010</p>
                    </div>
                    <div class="email-info">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <p class="p4"><a href="mailto:email2@example.com">email2@example.com</a></p>
                    </div>
                </div>
            </div><!-- col -->
            <div class="col-lg-4 footer-center">
                <h4>Newsletter</h4>
                <p>Register to our newsletter and be updated with the latests information regarding our services, offers and much more.</p>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-4 control-label"></label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text1" class="col-lg-4 control-label"></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="text1" placeholder="Your Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                        </div>
                    </div>
                </form><!-- form -->
            </div><!-- col -->
            <div class="col-lg-4 footer-right">
                <h4>Support Us</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <ul class="social-icons2">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
    <hr>
    <footer class="text-center">Copyright © 2019.Company name All rights reserved.</footer>
</section>
</body>
</html>