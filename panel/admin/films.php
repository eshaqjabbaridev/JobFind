<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
        <title>آموزشگاه فنی حرفه ای عصر مهارت | دوره ها</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../asset/css/style.css">
    </head>
    <body>
        <!-- START PANEL -->
        <div id="bar">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-md-6">
                       <img src="../../img/resp-logo.png">                       
                   </div>
                   <div class="col-md-6 text-left">
                       <a href="../../login.html"> <i class="fa fa-power-off"></i> </a>
                   </div>
               </div>
           </div>
        </div>
        <?php include "../asset/theme/aside.html"; ?>
        <div class="float-left" id="content">
            <div class="container-fluid">
                <div class="row mb-3">
                   <div class="col-md-6">
                       <span class="page-logo"><i class="fa fa-youtube-play"></i></span> لیست فیلم ها
                   </div>
                    <div class="col-md-6"> 
                        <a href="add-course.html" class="btn btn-outline-success float-left">افزودن فیلم</a>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-responsive-lg">
                            <thead class="bg-light">
                                <tr>
                                    <th>نام فیلم</th>
                                    <th>رشته</th>
                                    <th>تعداد جلسات</th>
                                    <th>مدرس</th>
                                    <th>هزینه</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>آموزش هک</td>
                                    <td>کامپیوتر</td>
                                    <td>5</td>
                                    <td>علی نوظهوریان</td>
                                    <td>150،000 تومان</td>
                                    <td>
                                        <a href="#"><i class="fa fa-trash-o"></i></a>
                                        <a href="#"><i class="fa fa-pencil-square-o"></i></a>
                                    </td>
                                </tr>
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