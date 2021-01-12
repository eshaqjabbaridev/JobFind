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
if (isset($_POST['chngpass'])) {
    if ($_POST['new-pass'] == $_POST['new-pass-re']) {
        $update="UPDATE `tbl_users` SET `password`='".$_POST['new-pass']."' WHERE `username`='".$_SESSION['user']."'";
        mysqli_query($con,$update);
        $msg="کلمه عبور تغییر یافت";
    }
    else {
        $msg="تکرار کلمه عبور مطابقت ندارد";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
        <title>آموزشگاه فنی حرفه ای عصر مهارت | تعویض کلمه عبور</title>
        
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
                                <form action="change-password.php" method="POST">
                                    <div class="form-group">
                                        <label for="new-pass">کلمه عبور جدید</label>
                                        <input type="password" class="form-control" name="new-pass">
                                    </div>
                                    <div class="form-group">
                                        <label for="new-pass-re">تکرار کلمه عبور جدید</label>
                                        <input type="password" class="form-control" name="new-pass-re">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="تغییر کلمه عبور" class="btn btn-success" name="chngpass">
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