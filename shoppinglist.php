<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/mycss.css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>shoppinglist</title>
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

<div onselectstart="return false;" class="bottom_add">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box" id="box">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            <label>
                                <input id="checkAll" type="checkbox" class="checkAll check" checked>全选
                            </label>
                        </th>
                        <th>商品</th>
                        <th>单价</th>
                        <th>数量</th>
                        <th>小计</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    <?php
                    require ("conn.php");
                    session_start();
                    $u_id = $_SESSION['username'];
                    $query="SELECT * FROM shopcar where u_id ='$u_id' ";
                    $result = $conn ->prepare($query);
                    $result->execute();

                    while ($res=$result->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td>
                            <input type="checkbox" id="check" checked>
                        </td>
                        <td>
                            <img class="Product_picture" src="./image/<?php echo $res['s_img'];?>">《<?php echo $res['s_name'];?>》
                        </td>
                        <td><?php echo $res['s_price'];?></td>
                        <td>
                            <span id="reduce" class="btn btn-default">-</span><input id="text" class="form-number" type="number" value="1"><span id="add" class="btn btn-default">+</span>
                        </td>
                        <td><?php echo $res['s_price'];?></td>
                        <td>
                            <span id="del" class="btn btn-danger">删除</span>
                        </td>
                    </tr>
                    <?php }
                    $conn = null;
                    ?>
                    </tbody>
                </table>
                <div class="bottom" id="bottom">
                    <!-- <aside>
                      #用于弹出框的商品小图
                    </aside> -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <p id="delAll" class="btn btn-danger btn-lg">全部删除</p>
                            </div>
                            <div class="col-md-4">
                                <div>已选商品：
                                    <span class="selected" id="num">3</span>件
                                </div>
                                <div>合计：￥
                                    <span class="total" id="total">7000</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!-- <a href="#" class="show">显示或隐藏</a> -->
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-lg">结&nbsp;&nbsp;&nbsp;算</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function $(exp){//获取元素
        var el;
        if (/^#\w+$/.test(exp)){
            el=document.querySelector(exp);
        } else {
            el=document.querySelectorAll(exp);
        }
        return el;
    }
    var tbody=$('#tbody');
    var trs=$('#tbody tr');
    var box=$('#box');
    // var aside=$('#bottom aside')[0];
    box.onclick=function (ev) {
        //利用事件冒泡的原理，把事件添加给父级box
        var e=ev||event;
        var target=e.target||e.srcElement;//获取当前点击对象
        // var cls=target.className;
        var cls=target.id;
        if (cls.indexOf("check")!=-1)cls='check';
        switch (cls) {
            case 'add'://添加商品数量
                var tr=target.parentNode.parentNode;//找到点击过那一行
                var tds=tr.cells;
                target.previousSibling.value++;//数量那一栏的数字加一
                tds[4].innerText=(tds[2].innerText*target.previousElementSibling.value).toFixed(2);
                //修改小计里面的价格
                break;
            case 'reduce'://减少商品数量
                var tr=target.parentNode.parentNode;//找到点击过那一行
                var tds=tr.cells;
                if (target.nextElementSibling.value!=1) target.nextElementSibling.value--;
                //数量那一栏减一
                tds[4].innerText=(tds[2].innerText*target.nextElementSibling.value).toFixed(2);
                //修改小计里面的价格
                break;
            case 'text'://直接修改数量那一栏input的值
                var tr=target.parentNode.parentNode;
                var tds=tr.cells;
                target.onblur=function () {//失去焦点时执行
                    tds[4].innerText=(tds[2].innerText*this.value).toFixed(2);
                    this.onblur=null;//销毁事件
                };
                break;
            case 'del': //删除商品
                var tr=target.parentNode.parentNode;
                if (confirm('你确定要删除吗？'))
                    tbody.removeChild(tr);
                break;
            case 'check'://复选框选择商品
                chk(target);//执行复选框函数
                break;
            case 'delAll'://删除全部商品
                if (confirm('你确定要删除吗？'))
                    tbody.innerHTML='';
                break;
            // case 'show'://显示、隐藏商品
            //     aside.classList.toggle('on');
            //     break;
            case 'cancel':
                var index=target.getAttribute('data-index');
                trs[index].cells[0].children[0].checked=false;
        }
        total();//计算价格
    };
    var total_all=$('#total');
    var num=$('#num');
    total();
    function total() {//计算价格
        var sum=0,number=0;
        trs=$('tbody tr');
        // console.log(trs);
        var str='';
        trs.forEach(function (tr,i) {
            //遍历每一行判断，将已选择商品添加到显示隐藏里面
            var tds=tr.cells;
            if (tds[0].children[0].checked){
                sum+=parseFloat(tds[4].innerText);
                number+=parseInt(tds[3].children[1].value);
                // str+=`<div><img src="images/${i+1}.jpg"><span class="cancel" data-index="${i}">取消选择</span></div>`
            }
            total_all.innerText=sum.toFixed(2);
            num.innerText=number;
            // aside.innerHTML=str;
        })
    }
    var checkAll=$('#box .checkAll');
    function chk(target) {//复选框判断
        var cls=target.id;
        var flag = true;
        if (cls==='check'){//点击非全选复选框
            /*当存在一个复选框未选中，全选框为false*/
            for (var i = 0; i < trs.length; i++) {
                var checkbox = trs[i].cells[0].children[0];
                if (!checkbox.checked) {
                    flag = false;
                    break
                }
            }
            checkAll[0].checked  = flag;
        }else {//点击全选复选框，所有复选框的状态保持一致
            for (var i = 0; i < trs.length; i++) {
                var checkbox = trs[i].cells[0].children[0];
                checkbox.checked = target.checked;
            }
            checkAll[0].checked = target.checked;
        }
    }
</script>
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