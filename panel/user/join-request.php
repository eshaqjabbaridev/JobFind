<?php
global $rows;
global $msg;
require "../../theme/db-config.php";
require "../asset/theme/jdf.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../../login.php');
}
$exist="SELECT * FROM `tbl_intern` WHERE `username`='".$_SESSION['user']."'";
$result=mysqli_query($con,$exist);
$rows=mysqli_fetch_array($result);
if (isset($_POST['btn_Req'])) {
    $isexist="SELECT `course_name` FROM `tbl_testjoin` WHERE `course_name`='".$_POST['course']."'";
    $query = mysqli_query($con,$isexist);
    $row_num=mysqli_num_rows($query);
    if($row_num==1) {
        $msg="این دوره قبلا ثبت شده است!";
    }
    else {    
        $req="INSERT INTO `tbl_testjoin`(`course_name`, `username`, `date`) VALUES ('".$_POST['course']."','".$_SESSION['user']."','".jdate("j F Y", time())."')";
        mysqli_query($con,$req);
        $add_event="INSERT INTO `tbl_event`(`event-desc`, `date`) VALUES ('هنر آموز ".$_SESSION['user']."برای شرکت در آزمون دوره ".$_POST['course']."درخواست داد','".jdate("j F Y", time())."')";
        mysqli_query($con,$add_event);
        $msg="ثبت در خواست با موفقیت انجام شد";
    }
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
        <?php include "../asset/theme/bar.php";?>
        <?php include "../asset/theme/aside.php";?>
        <div class="float-left" id="content">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">معرفی به آزمون</div>
                    <div class="card-body">
                       <?= $msg; ?>
                        <form action="join-request.php" method="post">
                            <table class="table table-responsive-sm table-borderless">
                                <tr>
                                    <td><label for="course">نام دوره</label></td>
                                    <td>
                                        <select name='course' class='custom-select'>
                                            <?php
                                            $view="SELECT `course_name` FROM `tbl_coursereg` WHERE `username` ='".$_SESSION['user']."'";
                                            $q=mysqli_query($con,$view);
                                            while($rows=mysqli_fetch_array($q)){
                                                echo "<option value='".$rows['course_name']."'>".$rows['course_name']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" class="btn btn-success" name="btn_Req" value="درخواست">
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">دوره های معرفی شده</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>نام دوره</td>
                                    <td>تاریخ معرفی</td>
                                    <td>وضعیت معرفی به فنی حرفه ای</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                mysqli_set_charset($con,"utf-8");
                                $view="SELECT * FROM `tbl_testjoin` WHERE `username` = '".$_SESSION['user']."'";
                                $q=mysqli_query($con,$view);
                                $rows=mysqli_fetch_array($q); 
                                echo "
                                <tr>
                                <td>".$rows['course_name']."</td>
                                <td>".$rows['date']."</td>";
                                if ($rows['status'] == 1) {
                                    echo "<td>به مرکز آزمون معرفی شده - <a href='#'>دریافت کارت</a> </td>"; 
                                }
                                else {
                                    echo "<td>به مرکز آزمون معرفی نشده</td>";
                                }                          
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