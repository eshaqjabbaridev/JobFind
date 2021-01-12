<?php
require "../../theme/db-config.php";
require "../asset/theme/function/upload.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../../login.php');
}
if (isset($_POST['btn_Reg'])) {
    $headline=implode(', ', $_POST['hdln']);
    if (isset($headline)) {
        mysqli_set_charset($con,"utf-8");
        $sql="INSERT INTO `tbl_course`(`course_name`, `start_date`, `end_date`, `num_lesson`, `into_video`, `thumb_pic`, `course_desc`, `teacher`, `salary`,`present_day`,`present_time`) VALUES ('".$_POST['cn']."','".$_POST['sd']."','".$_POST['ed']."','".$_POST['ln']."','','','".$_POST['des']."','".$_POST['tn']."','".$_POST['salary']."','".$_POST['pd']."','".$_POST['pt']."')";
        mysqli_query($con,$sql);
        $hl="INSERT INTO `tbl_headline`(`course_name`, `headline`) VALUES ('".$_POST['cn']."','".$headline."')";
        mysqli_query($con,$hl);
    }
    else {
        echo "Error!";
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
        <?php include "../asset/theme/bar.php"; ?>
        <?php include "../asset/theme/aside.php"; ?>
        <div class="float-left" id="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">دوره جدید</div>
                        <div class="card-body">
                            <form action="add-course.php" method="post">
                                <div class="form-group">
                                    <label>نام دوره:</label>
                                    <input type="text" class="form-control" name="cn">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>تاریخ شروع:</label>
                                            <input type="text" class="form-control" name="sd">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>تاریخ پایان:</label>
                                            <input type="text" class="form-control" name="ed">
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>تعداد جلسات:</label>
                                            <input type="text" class="form-control" name="ln">
                                        </div>        
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">                                       
                                        <label>روز های برگزاری:</label>
                                        <input type="text" class="form-control" name="pd">
                                    </div>
                                    <div class="col-md-6">
                                        <label>ساعت برگزاری:</label>
                                        <input type="text" class="form-control" name="pt"> 
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">                                       
                                        <label>مدرس:</label>
                                        <input type="text" class="form-control" name="tn">
                                    </div>
                                    <div class="col-md-6">
                                        <label>شهریه</label>
                                        <div class="input-group" style="direction: ltr;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">تومان</span>
                                            </div>
                                            <input type="text" class="form-control text-right" name="salary"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">                                 
                                        <label>ویدئوی معرفی</label>
                                        <input type="file" class="form-control" name="int-v">
                                    </div>
                                    <div class="col-md-6">
                                        <label>عکس بند انگشتی</label>
                                        <input type="file" class="form-control" name="tp">               
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>توضیحات دوره</label>
                                    <textarea class="form-control" cols="30" rows="3" name="des"></textarea>
                                </div> 
                                <div class="form-group">
                                    <label>سر فصل ها</label>
                                    <select name="hdln" size="5" multiple class="custom-select" id="hl">
                                    </select>                                        
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>عنوان سر فصل</label>
                                        <input type="text" class="form-control" id="add">
                                    </div>
                                    <div class="col-md-6">
                                        <span class="btn btn-light" onclick="addto()">افزودن سرفصل</span>
                                    </div>
                                </div>
                                <input type="submit" value="ثبت اطلاعات" class="btn btn-outline-success" name="btn_Reg">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- JS -->
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        
        <script>
            var y = window.innerHeight+"px";
            document.getElementsByTagName("aside").style.height=y;
        </script>
        <script>
            function addto() {
                var x = document.getElementById("hl");
                var option = document.createElement("option");
                option.text = document.getElementById("add").value;
                x.add(option);
            }
        </script>
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