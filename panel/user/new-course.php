<?php
global $rows;
global $msg;
require "../../theme/db-config.php";
require "../asset/theme/jdf.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../../login.php');
}
if (isset($_POST['regi'])) {
    $new_course="INSERT INTO `tbl_coursereg`(`username`, `course_name`, `reg_date`) VALUES ('".$_SESSION['user']."','".$_POST['courses']."','".jdate("j F Y", time())."')";
    mysqli_query($con,$new_course);
    $add_event="INSERT INTO `tbl_event`(`event-desc`, `date`) VALUES ('هنر آموز ".$_SESSION['user']." دوره ".$_POST['courses']." را پیش ثبت نام کرد','".jdate("j F Y", time())."')";
    mysqli_query($con,$add_event);
    $msg="پیش ثبت نام با موفقیت انجام شد";
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">تعویض کلمه عبور</div>
                            <div class="card-body">
                                <p><?php echo $msg; ?></p>
                                <form action="new-course.php" method="POST">
                                    <div class="form-group">
                                        <label for="courses">دوره های موجود</label>
                                        <select name='courses' class='custom-select'>
                                        <?php
                                        mysqli_set_charset($con,"utf-8");
                                        $view="SELECT * FROM `tbl_course`";
                                        $q=mysqli_query($con,$view);
                                        while($rows=mysqli_fetch_array($q)){
                                            echo "
                                            <option value='".$rows['course_name']."'>".$rows['course_name']."</option>";
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="پیش ثبت نام" class="btn btn-success" name="regi">
                                    </div>
                                </form>
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