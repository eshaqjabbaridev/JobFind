<?php
global $msg;
require "../../theme/db-config.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../../login.php');
}

$sql="SELECT `salary` FROM `tbl_course` WHERE `course_name`='".$_POST['course']."'";
$re=mysqli_query($con,$sql);
$ro=mysqli_fetch_array($re);

$modo=$ro['salary']-$_POST['mablagh'];
$status="";
if($modo==0) {
    $status=1;
}
else {
    $status=2;    
}
mysqli_set_charset($con,"utf-8");
if(isset($_POST['salary'])) {
  mysqli_set_charset($con,"UTF-8");
  $pay=$_POST['mablagh'];
  $sql="INSERT INTO `tbl_salary`(`username`, `course_name`, `price`, `paied`, `mande`, `status`) VALUES ('".$_POST['payer']."','".$_POST['course']."','".$ro['salary']."','".$_POST['mablagh']."','".$modo."','2')";
  mysqli_query($con,$sql);
  $msg="پرداخت انجام شد";
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
                            <div class="card-header">پرداخت شهریه</div>
                            <div class="card-body">
                                <form action="salary.php" method="get">
                                    <div class="form-group">
                                        مبلغ شهریه:
                                        <div class="input-group" style="direction: ltr;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">ریال</span>
                                            </div>
                                            <input name="money" type="text" class="form-control text-right">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>پرداخت کننده</label>
                                                <select name="payer" class="custom-select">
                                                    <?php
                                                    $sql="SELECT `f_name`,`l_name` FROM `tbl_intern`";
                                                    $res=mysqli_query($con,$sql);
                                                    while($rows=mysqli_fetch_array($res)){
                                                        $fullname=$rows['f_name']." ".$rows['l_name'];
                                                        echo "<option value='".$fullname."'>".$fullname."</option>";                   
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>برای دوره</label>
                                                <select name="course" class="custom-select">
                                                    <?php
                                                    $sql1="SELECT `course_name` FROM `tbl_course`";
                                                    $res1=mysqli_query($con,$sql1);
                                                    while($rows=mysqli_fetch_array($res1)){
                                                        $fullname=$rows['f_name']." ".$rows['l_name'];
                                                        echo "<option value='".$rows['course_name']."'>".$rows['course_name']."</option>";                   
                                                    }
                                                    ?>
                                                </select>
                                            </div>        
                                        </div>
                                    </div>
                                    <input name="salary" type="submit" value="ثبت شهریه" class="btn btn-outline-success">
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