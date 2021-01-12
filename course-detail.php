<?php
global $rows;
require "theme/db-config.php";
$course = "SELECT * FROM `tbl_course` WHERE id='".$_GET['id']."'";
$res=mysqli_query($con,$course);
$rows=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
        <title>آموزشگاه فنی حرفه ای عصر مهارت</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css"> 
        <link rel="stylesheet" href="css/detail.css">       
    </head>
    <body>
        <!-- Start Header -->
        <?php require "theme/header.php"; ?>
        <!--End Header-->
        <!-- MAIN -->
        <div class="container-fluid main">
            <div class="card box mb-3">
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                           <h3><?= $rows['course_name']; ?></h3>
                       </div>
                       <div class="col-md-6 text-left">
                           <a href="#" class="btn btn-success">نمایش همه دوره ها</a>
                       </div>
                   </div>
                </div>
            </div>
            <div class="d-title"><i class="fa fa-info-circle"></i> مشخصات درس</div>
            <div class="card box">
                <div class="card-body">
                   <table class="detail-table">
                       <tr>
                           <td><b>دپارتمان: </b>فناوری اطلاعات</td>
                           <td><b>درس: </b> <?= $rows['course_name']; ?></td>
                       </tr>
                   </table>
                </div>
            </div>
            <div class="d-title mt-3"><i class="fa fa-mortar-board"></i> معرفی</div>
            <div class="card box">
                <div class="card-body">
                </div>
            </div>
            <div class="d-title mt-3"><i class="fa fa-pencil-square-o"></i> ثبت نام</div>
            <div class="card box mb-3">
                <div class="card-body">
                   <table class="detail-table">
                       <tr>
                           <td><b>تاریخ شروع: </b><?= $rows['start_date']; ?></td>
                           <td><b>تاریخ پایان: </b><?= $rows['end_date']; ?></td>
                       </tr>
                       <tr>
                           <td><b>شهریه: </b><?= $rows['salary']." ریال"; ?></td>
                           <td><b>تخقیف: </b></td>
                       </tr>
                       <tr>
                           <td><b>روز های برگزاری: </b><br><?= $rows['present_day']." - ".$rows['present_time']; ?></td>
                           <td></td>
                       </tr>
                   </table>
                </div>
            </div>
        </div>
        <!-- END -->
        <?php require "theme/footer.php"; ?>
