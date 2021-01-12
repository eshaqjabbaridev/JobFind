<?php
global $rows;
global $msg;
$msg="";
$err=0;
require "../../theme/db-config.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../../login.php');
}
if (isset($_POST['update'])) {
    $target_dir    = "../asset/pics/";
    $target_file   = $target_dir . basename( $_FILES["pic"]["name"] );
    $uploadOk      = 1;
    $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
    $check = getimagesize( $_FILES["pic"]["tmp_name"] );
    if ( $check !== false ) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        $err=1;
    }
    if ( $_FILES["pic"]["size"] > 500000 ) {
        $uploadOk = 0;
        $err=2;
    }
    if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
        $err=3;
    }
    if ($uploadOk == 0) {
        switch ($err) {
            case 1:
                $msg="لطفا عکس آپلود کنید";
                break;
            case 2:
                $msg="سایز عکس بزرگ است";
                break;
            case 3:
                $msg="فقط فرمت های PNG, JPG, GIF مورد تایید است";
                break;
        }
    }
    else {
        if (move_uploaded_file( $_FILES["pic"]["tmp_name"], $target_file )) {
            mysqli_set_charset($con,"utf-8");
            $update="UPDATE `tbl_intern` SET `f_name`='".$_POST['fn']."',`l_name`='".$_POST['ln']."',`fa_name`='".$_POST['fan']."',`id_num`='".$_POST['id-number']."',`idcard_num`='".$_POST['idcard-number']."',`birthday`='".$_POST['bd']."',`birth_place`='".$_POST['bp']."',`release_place`='".$_POST['rp']."',`address`='".$_POST['loc']."',`phone`='".$_POST['call']."',`personal_img`='".$target_file."' WHERE `username`='".$_SESSION['user']."'";
            if(!mysqli_query($con,$update)) {
                echo mysqli_error($con);
            }
        }
        else {
            $msg="خطایی در آپلود عکس روی داده است";
        }
    }        
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
                    <div class="card-header">
                        پروفایل
                    </div>
                    <div class="card-body">
                       <?= $msg; ?>
                        <form action="dashboard.php" method="post"  enctype="multipart/form-data">
                           <div class="form-group">
                               نام کاربری:
                               <input disabled type="text" class="form-control" value="<?php echo $_SESSION['user']; ?>">
                           </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        نام:
                                        <input name='fn' type='text' class='form-control' value='<?php echo $rows['f_name']; ?>'>
                                    </div>                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        نام خانوادگی:
                                        <input name='ln' type='text' class='form-control' value='<?php echo $rows['l_name']; ?>'>
                                    </div>                        
                                </div>
                            </div>
                            <div class="form-group">
                                نام پدر:
                                <input type='text' class='form-control' name='fan' value='<?php echo $rows['fa_name']; ?>'>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        شماره شناسنامه:
                                        <?php echo "<input type='text' class='form-control' name='id-number' value='".$rows['id_num']."'>"; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        کد ملی:
                                        <?php echo "<input type='text' class='form-control' name='idcard-number' value='".$rows['idcard_num']."'>"; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        تاریخ تولد:
                                        <?php echo "<input name='bd' type='text' class='form-control' value='".$rows['birthday']."'>"; ?>
                                    </div>                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        محل تولد:
                                        <?php echo "<input name='bp' type='text' class='form-control' value='".$rows['birth_place']."'>"; ?>
                                    </div>                        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        محل صدور:
                                        <?php echo "<input name='rp' type='text' class='form-control' value='".$rows['release_place']."'>"; ?>
                                    </div>                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        شماره تماس:
                                        <?php echo "<input type='text' class='form-control' name='call' value='".$rows['phone']."'>";?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                آدرس:
                                <?php echo "<textarea class='form-control' name='loc' rows='3' cols='10'>".$rows['address']."</textarea>"; ?>
                            </div>
                            <div class="form-group">
                                عکس پرسنلی:
                                <input type="file" class="form-control" name="pic" dirname="1.png">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="ویرایش اطلاعات" class="btn btn-success" name="update">
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