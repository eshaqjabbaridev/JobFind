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
if(isset($_POST['pay'])) {
  mysqli_set_charset($con,"UTF-8");
  $pay=$_POST['mablagh'];
  $sql="INSERT INTO `tbl_salary`(`username`, `course_name`, `price`, `paied`, `mande`, `status`) VALUES ('".$_SESSION['user']."','".$_POST['course']."','".$ro['salary']."','".$_POST['mablagh']."','".$modo."','2')";
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
              <div class="card">
                  <div class="card-header">پرداخت</div>
                  <div class="card-body">
                    <p><?php echo $msg; ?></p>
                    <form action="salary-pay.php" method="POST">
                        <table class="table table-responsive-sm table-borderless">
                            <tr>
                                <td><label for="course">نام دوره</label></td>
                                <td>
                                    <select name="course" class="custom-select">
                                        <?php
                                        $view="SELECT * FROM `tbl_course`";
                                        $q=mysqli_query($con,$view);
                                        while($rows=mysqli_fetch_array($q)){
                                            echo "<option value='".$rows['course_name']."'>".$rows['course_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>مبلغ</td>
                                <td>
                                    <div class="input-group mb-3" style="direction: ltr;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">ریال</span>
                                        </div>
                                        <input type="text" class="form-control text-right" aria-describedby="basic-addon1" name="mablagh">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" class="btn btn-success" name="pay" value="پرداخت">
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