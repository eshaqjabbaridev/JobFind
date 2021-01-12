<?php
require "theme/db-config.php";
global $msg;
$msg = "";
if (isset($_POST['btn-login'])) {
    $find="SELECT `username`,`password`,`type` FROM `tbl_user` WHERE `username`='".$_POST['username']."' AND `password`='".$_POST['pass']."'";
    $find_query = mysqli_query($con,$find);
    $num=mysqli_num_rows($find_query);
    $rows=mysqli_fetch_array($find_query);
    if($num==1) {
        if ($rows['type']=="1") {
            echo "<script> location.replace('panel/admin/dashboard.php')</script>";
            session_start();
            $_SESSION['user']=$rows['username'];
            $_SESSION['type']=$rows['type'];
        }
        else {
            echo "<script> location.replace('panel/user/dashboard.php')</script>";
            session_start();
            $_SESSION['user']=$rows['username'];
            $_SESSION['type']=$rows['type'];
        }
    }
    else {
        $msg="نام کاربری / کلمه عبور اشتباه است";
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
        <title>آموزشگاه فنی حرفه ای عصر مهارت | ورود</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">        
        <link rel="stylesheet" href="css/login.css">                
    </head>
    <body>
        <!-- Start Header -->
        <?php include "theme/header.php"; ?>
        <!-- End Header -->              
        <!-- contant -->
        <div class="container-fluid" style="height: 505px;">
            <div id="form">
                <span class="title">وارد شوید!</span>
                    <form action="login.php" method="post" class="mb-3">
                        <p class="error"><?php echo $msg;?></p>
                        <div class="form-group">
                            <label >نام کاربری:</label><br>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label >کلمه عبور:</label><br>
                            <input type="password" class="form-control" name="pass" id="pass">
                            <div id="showpass">
                                <span id="show" on>نمایش</span> <span id="hide">پنهان</span>
                            </div>
                        </div>
                        <input type="submit" value="وارد شوید" class="btn btn-success" name="btn-login">   
                        <a href="pass-forget.php" id="forget">رمز عبورتان را فراموش کردید؟</a>          
                    </form>
                    <a href="#">
                        <div class="mb-3" id="google">
                            <div id="icon"><i class="fa fa-google"></i></div>
                            <span class="text-center">با حساب گوگل خود وارد شوید</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- Start Footer -->
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <p class="title mb-3">با ما در تماس باشید</p>
                        <table>
                            <tr>
                                <td> <i class="fa fa-map-marker"></i> </td>
                                <td>
                                    آدرس: اراک، میدان شهدا، ابتدای خیابان شهید رجایی (ملک)
                                    جنب پردیس سینمایی عصر جدید، مجتمع تجاری-اداری 
                                    اطلس، طبقه 4 واحد 10            
                                </td>
                            </tr>
                            <tr>
                                <td> <i class="fa fa-phone"></i> </td>
                                <td>
                                    32222578 086
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <p class="title mb-3">باخبر بمانید</p>
                        <form id="feed">
                            <input type="text" placeholder="ایمیل خود را وارد کنید">
                            <input type="submit" value="عضو شو!">
                        </form>
                    </div>
                    <div class="col-md-4">
                        <p class="title mb-3">ما را در شبکه های اجتماعی دنبال کنید</p>
                        <ul id="social">
                            <li id="insta">
                                <a href="https://www.instagram.com/asremaharat"> <i class="fa fa-instagram"></i> </a>
                            </li>
                            <li id="tlgram">
                                <a href="https://t.me/asremaharat"><i class="fa fa-send"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <div id="copyright">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">تمامی حقوق مادی و معنوی برای آموزشگاه عصر مهارت محفوظ است.</div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-left">
                        <img src="img/samandehi.png">
                        &nbsp;
                        <img src="img/enemad.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer -->    

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#show").on('click',function(){
                    $("#pass").attr("type","text");
                    $("#hide").css("display","block");
                    $("#show").css("display","none");
                })
                $("#hide").on('click',function(){
                    $("#pass").attr("type","password");
                    $("#hide").css("display","none");
                    $("#show").css("display","block");
                })
            })
        </script>    
    </body>
</html>