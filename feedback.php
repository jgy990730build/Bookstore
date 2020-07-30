<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/mycss.css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>反馈</title>
</head>
<body>
<?php
require ("conn.php");
error_reporting(E_ALL & ~E_NOTICE);
session_start();
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

<div class="container bottom_add">
    <div class="row">
        <div class="col-8 offset-2">
            <h2>联系我们</h2>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail2">You Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp1" class="form-text text-muted">写下你的邮箱，我们更方便通知你</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">You phone</label>
                    <input type="tel" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">留言</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>

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