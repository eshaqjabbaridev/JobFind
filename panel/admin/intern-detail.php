<?php
global $rows;
require "../../theme/db-config.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../../login.php');
}
$sql="SELECT * FROM `tbl_intern` WHERE id=".$_GET['id'];
$res=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($res); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>ناحیه کاربری</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../asset/css/style.css">
    </head>
    <body>
        <!-- START PANEL -->
        <?php include "../asset/theme/bar.php"; ?>
        <?php include "../asset/theme/aside.php"; ?>
        <div class="float-left" id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><b>مشخصات <?= $rows['f_name']." ".$rows['l_name']; ?></b></div>
                            <div class="card-body">
                               
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        نام و نام خانوادگی:<br>
                                        <b><?= $rows['f_name']." ".$rows['l_name']; ?></b>
                                    </div>
                                    <div class="col-md-6">
                                        نام پدر:<br>
                                        <b><?= $rows['fa_name']; ?></b>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        شماره شناسنامه:<br>
                                        <b><?= $rows['id_num']; ?></b>
                                    </div>
                                    <div class="col-md-6">
                                        کد ملی:<br>
                                        <b><?= $rows['idcard_num']; ?></b>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        تاریخ تولد:<br>
                                        <b><?= $rows['birthday']; ?></b>
                                    </div>
                                    <div class="col-md-6">
                                        محل تولد:<br>
                                        <b><?= $rows['birth_place']; ?></b>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        آدرس محل سکونت:<br>
                                        <b><?= $rows['address']; ?></b>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        دوره های شرکت کرده:
                                        <table class="table table-strap">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>نام دوره</th>
                                                    <th>تاریخ شرکت در دوره</th>
                                                    <th>مدرس</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>CIW</td>
                                                    <td>1398/06/01</td>
                                                    <td>امیر علی اکبری</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
        <!-- JS -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script>
            var dropdown = document.getElementsByClassName("dropdown-btn");
            var i;

            for (i = 0; i < dropdown.length; i++) {
                dropdown[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var dropdownContent = this.nextElementSibling;
                    if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                    } else {
                    dropdownContent.style.display = "block";
                    }
                });
            }
        </script>                
        
    </body>
</html>