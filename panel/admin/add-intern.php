<?php
require "../../theme/db-config.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../../login.php');
}
if (isset($_POST['new'])) {
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
                    <div class="card-header">ثبت کار آموز جدید</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12"> 
                                <form action="add-intern.php" method="post">
                                    <div class="form-group">
                                        <label for="un">نام کاربری</label>
                                        <input type="text" name="un" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="pass">کلمه عبور</label>
                                        <input type="password" name="pass" class="form-control" id="psw">
                                    </div>
                                    <div class="form-group">
                                        <label for="mail">پست الکترونیک</label>
                                        <input type="email" name="mail" class="form-control">
                                    </div>
                                    <input type="submit" value="ثبت" class="btn btn-success" name="new">
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