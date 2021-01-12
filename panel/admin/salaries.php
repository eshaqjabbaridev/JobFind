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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">شهریه های پرداخت شده</div>
                            <div class="card-body">
                                <table class="table table-striped">
                                   <thead class="bg-light">
                                       <tr>
                                           <th>پرداخت کننده</th>
                                           <th>مبلغ</th>
                                           <th>دوره</th>
                                           <th>تاریخ</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php
                                       $sql="SELECT * FROM `tbl_salary`";
                                       $res=mysqli_query($con,$sql);
                                       while($rows=mysqli_fetch_array($res)){
                                           echo "<tr>
                                           <td>".$rows['username']."</td>
                                           <td>".$rows['paied']." ريال</td>
                                           <td>".$rows['course_name']."</td>
                                           <td></td>
                                           </tr>";
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