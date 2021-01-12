<?php
global $msg;
require "../../theme/db-config.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../../login.php');
}
$exist="SELECT * FROM `tbl_intern` WHERE `username`='".$_SESSION['user']."'";
$result=mysqli_query($con,$exist);
$rows=mysqli_fetch_array($result);
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
        <?php include "../asset/theme/bar.php";?>
        <?php include "../asset/theme/aside.php";?>
        <div class="float-left" id="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header"><b>دوره ها</b></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>نام دوره</td>
                                    <td>روز های برگزاری</td>
                                    <td>ساعت برگزاری</td>
                                    <td>تاریخ شروع </td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            mysqli_set_charset($con,"utf-8");
                            $view="SELECT * FROM `tbl_course` WHERE `course_name` IN (
                            SELECT `course_name` FROM `tbl_coursereg` WHERE `username`='".$_SESSION['user']."')";
                            $q=mysqli_query($con,$view);
                            $rows=mysqli_fetch_array($q);
                            echo "
                                <tr>
                                    <td>".$rows['course_name']."</td>
                                    <td>".$rows['present_day']."</td>
                                    <td>".$rows['present_time']."</td>
                                    <td>".$rows['start_date']."</td>
                                </tr>";
                            ?>
                            </tbody>
                        </table>
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