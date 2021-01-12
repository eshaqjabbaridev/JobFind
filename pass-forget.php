<?php
require "theme/db-config.php";
global $msg;
$msg="";
if(isset($_POST['btn_Recover'])){
    $find="SELECT `username`,`email` FROM `tbl_users` WHERE `username`='".$_POST['un']."'";
    $find_query = mysqli_query($con,$find);
    $num=mysqli_num_rows($find_query);
    $rows=mysqli_fetch_array($find_query);
    if($num==1) {
        if ($_POST['mail-pass'] == "") {
            $msg="ایمیل وارد نشده است";
        }
        else {
            $msg="ایمیل بازیابی ارسال شد";            
        }
    }
    else {
        $msg="نام کاربری وارد شده صحیح نمیباشد";
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
        <title>آموزشگاه فنی حرفه ای عصر مهارت | فراموشی کلمه عبور</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">        
    </head>
    <body>
        <!-- Start Header -->
        <?php include "theme/header.php"; ?>
        <!-- End Header -->
        <!-- Contant -->
        <div class="container-fluid main">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h2>فراموشی کلمه عبور</h2>
                </div>
            </div>
            <div class="row">
                <div id="forget">
                    <div class="col-md-12">
                        <p><?php echo $msg; ?></p>
                        <form action="pass-forget.php" method="post">
                           <div class="form-group">
                               <label for="un">نام کاربری:</label>
                               <input type="text" name="un" class="form-control">
                           </div>
                           <div class="form-group">
                               <label for="mail-pass">ایمیل بازیابی:</label>
                               <input type="mail" name="mail-pass" class="form-control">
                           </div>
                            <input type="submit" class="btn btn-success" value="ارسال ایمیل کلمه عبور جدید" name="btn_Recover">
                        </form>
                    </div>
                </div>                
            </div>
        </div>
        <!-- Start Footer -->
        <?php include "theme/footer.php"; ?>