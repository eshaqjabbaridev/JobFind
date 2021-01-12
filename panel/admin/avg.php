<?php
require "../../theme/db-config.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../../login.php');
}
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
                <div class="card">
                    <div class="card-header"><b>ثبت نمره</b></div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-3" style="width: 90%;">
                                    <label>نام  نام خانوادگی:</label>
                                    <select class="custom-select">
                                        <?php
                                        $sql="SELECT `tbl_intern`.`f_name`, `tbl_intern`.`l_name` FROM `tbl_intern` INNER JOIN `tbl_testjoin` ON `tbl_intern`.`username` = `tbl_testjoin`.`username`";
                                        $res=mysqli_query($con,$sql);
                                        while($rows=mysqli_fetch_array($res)){
                                            echo "<option value='".$rows['f_name']." ".$rows['l_name']."'>".$rows['f_name']." ".$rows['l_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3" style="width: 90%">
                                    <label>دوره:</label>
                                    <select class="custom-select">
                                        <?php
                                        $sql="SELECT `course_name` FROM `tbl_testjoin` WHERE `username` = '".$_SESSION['user']."'";
                                        $res=mysqli_query($con,$sql);
                                        while($rows=mysqli_fetch_array($res)){
                                            echo "<option value='".$rows['course_name']."'>".$rows['course_name']."</option>";
                                        }
                                        ?>                                    
                                    </select>
                                </div>
                                <div class="col-md-3" style="width: 90%">
                                    <label>نمره:</label>
                                    <input type="text" class="form-control"> 
                                </div>
                                <div class="col-md-3" style="width: 90%">
                                    <label>نوع آزمون:</label>
                                    <select class="custom-select">
                                        <option value="1">کتبی</option>
                                        <option value="2">عملی</option>
                                        <option value="3">نهایی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <input type="submit" value="ثیت نمره" class="btn btn-outline-success">
                                </div>
                            </div>
                        </form>
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