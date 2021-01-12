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
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../asset/css/style.css">
    </head>
    <body>
        <!-- START PANEL -->
        <?php include "../asset/theme/bar.php" ?>
        <?php include "../asset/theme/aside.php" ?>
        <div class="float-left" id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <a href="courses.php"><div id="course">
                            دوره های موجود<br> 
                            <?php
                            $sql="SELECT `course_name` FROM `tbl_course`";
                            $res=mysqli_query($con,$sql);
                            $num=mysqli_num_rows($res);
                            echo "<span class='wow'>".$num." دوره</span>";
                            ?>                                                       
                        </div></a>
                    </div>
                    <div class="col-md-4">
                        <a href="salaries.php"><div id="salary">
                            شهریه دریافت شده<br>
                            <?php
                            $sql="SELECT SUM(`paied`) FROM `tbl_salary`";
                            $res=mysqli_query($con,$sql);
                            $rows=mysqli_fetch_array($res);
                            if ($rows['SUM(`paied`)'] == 0) {
                                echo "<span class='wow'>0 ریال</span>";
                            }
                            else {
                                echo "<span class='wow'>".$rows['SUM(`paied`)']." ریال</span>";    
                            }
                            ?>
                        </div></a>
                    </div>
                    <div class="col-md-4">
                        <a href="interns.php"><div id="intern">
                            هنرجویان<br>
                            <?php
                            $sql="SELECT `username` FROM `tbl_intern`";
                            $res=mysqli_query($con,$sql);
                            $num=mysqli_num_rows($res);
                            echo "<span class='wow'>".$num." نفر</span>";
                            ?>
                        </div></a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <i class="fa fa-calendar"></i> رویداد های جدید
                                <table class="table table-striped mt-3">
                                    <?php
                                    $sql="SELECT `event-desc`,`date` FROM `tbl_event`";
                                    $res=mysqli_query($con,$sql);
                                    while($rows=mysqli_fetch_array($res)){
                                        echo "<tr>
                                            <td>".$rows['event-desc']."</td>
                                            <td>".$rows['date']."</td>
                                        </tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PANEL -->
        <!-- JS -->
        <script src="../asset/js/jquery.min.js"></script>
        <script src="../asset/js/popper.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>

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