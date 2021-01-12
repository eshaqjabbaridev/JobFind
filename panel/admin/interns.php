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
        <?php include "../asset/theme/bar.php" ?>
        <?php include "../asset/theme/aside.php" ?>
        <div class="float-left" id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><b>لیست کار آموزان</b></div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="bg-light">
                                       <tr>
                                           <th>نام و نام خانوادگی</th>
                                           <th>نام پدر</th>
                                           <th>شماره شناسنامه</th>
                                           <th>محل صدور</th>
                                           <th>تاریخ تولد</th>
                                           <th>محل تولد</th>
                                           <th>آدرس</th>
                                           <th>عکس پرسنلی</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php
                                        $sql="SELECT * FROM `tbl_intern`";
                                        $res=mysqli_query($con,$sql);
                                        while($rows=mysqli_fetch_array($res)){
                                            echo "<tr>
                                               <td><a href='intern-detail.php?id=".$rows['id']."'>".$rows['f_name']." ".$rows['l_name']."</a></td>
                                               <td>".$rows['fa_name']."</td>
                                               <td>".$rows['id_num']."</td>
                                               <td>".$rows['release_place']."</td>
                                               <td>".$rows['birthday']."</td>
                                               <td>".$rows['birth_place']."</td>
                                               <td>".$rows['address']."</td>
                                               <td><img src='".$rows['personal_img']."' class='personal-pic'></td>
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