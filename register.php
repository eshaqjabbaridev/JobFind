<?php
require "theme/db-config.php";
require "panel/asset/theme/jdf.php";
global $msg;
$msg = "";
if (isset($_POST['register'])) {
    $isexist="SELECT `username` FROM `tbl_user` WHERE `username`='".$_POST['un']."'";
    $query = mysqli_query($con,$isexist);
    $row_num=mysqli_num_rows($query);
    if($row_num==1) {
        $msg="این نام کاربری قبلا ثبت شده است!";
    }elseif ($_POST['pass'] != $_POST['repass']) {
        $msg ="تکرار کلمه عبور مطابقت ندارد!";
    }
    else {
        $insert="INSERT INTO `tbl_user`(`username`, `password`, `email`, `type`) VALUES ('".$_POST['un']."','".$_POST['pass']."','".$_POST['mail']."','2')";
        mysqli_query($con,$insert);
        $insert_info="INSERT INTO `tbl_intern` (`username`) VALUE ('".$_POST['un']."')";
        mysqli_query($con,$insert_info);
        $add_event="INSERT INTO `tbl_event`(`event-desc`, `date`) VALUES ('یک هنر آموز جدید با نام کاربری ".$_POST['un']."ثبت نام کرد','".jdate("j F Y", time())."')";
        mysqli_query($con,$add_event);
        echo "<script> location.replace('confirm.php')</script>";
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
        <title>آموزشگاه فنی حرفه ای عصر مهارت | ثبت نام</title>

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
        <div class="container-fluid main">
            <div class="mb-3" id="form">
                <span class="title">ثبت نام کنید!</span>
                <span class="des">در کمتر از 1 دقیقه برای خود یک حساب کاربری بسازید!</span>
                <p class="error"><?php echo $msg; ?></p>
                <form action="register.php" method="post">
                        <div class="form-group">
                        <label for="un">نام کاربری</label>
                        <input type="text" name="un" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass">کلمه عبور</label>
                        <input type="password" name="pass" class="form-control" id="psw">
                    </div>
                    <div class="form-group">
                        <label for="repass">تکرار کلمه عبور</label>
                        <input type="password" name="repass" class="form-control" id="re-psw">
                    </div>
                    <div class="form-group">
                        <label for="mail">پست الکترونیک</label>
                        <input type="email" name="mail" class="form-control">
                    </div>
                    <input type="submit" value="ثبت نام کنید" class="btn btn-success" name="register">
                    حساب کاربری د اری؟ <a href="login.php">وارد شو</a>!
                    <div id="google" class="mt-3">
                        <div id="icon"><i class="fa fa-google"></i></div>
                        <span class="text-center">با حساب گوگل خود ثبت نام کنید </span>
                    </div>
                </form>
            </div>
        </div>
        <!-- end -->
        <!-- Start Footer -->
        <?php include "theme/footer.php"; ?>