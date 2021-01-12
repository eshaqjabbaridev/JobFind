<?php require "theme/db-config.php"; ?>
<!DOCTYPE html>
<html lang="fa">
    <head>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
        <title>آموزشگاه فنی حرفه ای عصر مهارت</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css"> 
    </head>
    <body>
        <!-- Start Header -->
        <?php include "theme/header.php"; ?>
        <!-- End Header -->
        <!-- Start Slider -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/img2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/img1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/img4.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- end slider -->
        <!-- Course -->
        <section>
            <div class="container-fluid">            
                <div class="row mb-3">
                    <div class="col-md-10">
                        <span class="title">دوره های آموزشی</span>
                    </div>
                    <div class="col-md-2">
                        <a href="course-list.php" class="btn btn-danger" id="more">بیشتر</a>
                    </div>
                </div>
                <div class="row">
                   <?php
                    $course = "SELECT `id`,`course_name`,`thumb_pic`,`teacher` FROM `tbl_course` LIMIT 3";
                    $res=mysqli_query($con,$course);
                    while($rows=mysqli_fetch_array($res)) {
                        echo "<div class='col-md-4'>
                        <div class='card'>
                            <img src='".$rows['thumb_pic']."' alt='cover'>
                            <div class='card-body'>
                                <h3 class='title'>".$rows['course_name']."</h3>
                            </div>
                            <div class='card-footer'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <img src='img/teacher.png' alt='teacher' class='profile'>
                                        ".$rows['teacher']."
                                    </div>
                                    <div class='col-md-6'>
                                        <a href='course-detail.php?id=".$rows['id']."' class='btn btn-danger'>مشاهده</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Videos -->
        <section>
            <div class="container-fluid">            
                <div class="row mb-3">
                    <div class="col-10">
                    <span class="title">فیلم های آموزشی</span>
                    </div>
                    <div class="col"> <a href="video-list.html" class="btn btn-danger" id="more">بیشتر</a> </div>
                </div>
                <div class="row">
                   
                    <?php
                    $course = "SELECT `id`,`course_name`,`thumb_pic`,`num_lesson` FROM `tbl_film` LIMIT 3";
                    $res=mysqli_query($con,$course);
                    while($rows=mysqli_fetch_array($res)) {
                        echo "<div class='col-md-4'>
                        <div class='card'>
                            <img src='".$rows['thumb_pic']."' alt='cover'>
                            <div class='card-body'>
                                <h3 class='title'>".$rows['course_name']."</h3>
                            </div>
                            <div class='card-footer'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <i class='fa fa-clock-o'></i>
                                        ".$rows['num_lesson']."
                                    </div>
                                    <div class='col-md-6'>
                                        <a href='video-detail.php?id=".$rows['id']."' class='btn btn-danger'>خرید</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Start Footer -->
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <p class="title mb-3">با ما در تماس باشید</p>
                        <table>
                            <tr>
                                <td> <i class="fa fa-map-marker"></i> </td>
                                <td>
                                    آدرس: اراک، میدان شهدا، ابتدای خیابان شهید رجایی (ملک)
                                    جنب پردیس سینمایی عصر جدید، مجتمع تجاری-اداری 
                                    اطلس، طبقه 4 واحد 10            
                                </td>
                            </tr>
                            <tr>
                                <td> <i class="fa fa-phone"></i> </td>
                                <td>
                                    32222578 086
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <p class="title mb-3">باخبر بمانید</p>
                        <form id="feed">
                            <input type="text" placeholder="ایمیل خود را وارد کنید">
                            <input type="submit" value="عضو شو!">
                        </form>
                    </div>
                    <div class="col-md-4">
                        <p class="title mb-3">ما را در شبکه های اجتماعی دنبال کنید</p>
                        <ul id="social">
                            <li id="insta">
                                <a href="https://www.instagram.com/asremaharat"> <i class="fa fa-instagram"></i> </a>
                            </li>
                            <li id="tlgram">
                                <a href="https://t.me/asremaharat"><i class="fa fa-send"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <div id="copyright">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">تمامی حقوق مادی و معنوی برای آموزشگاه عصر مهارت محفوظ است.</div>
                    <div class="col-md-4 text-center">
                        <img src="img/footer.png" alt="آموزشگاه عصر مهارت">
                    </div>
                    <div class="col-md-4 text-left">
                        <img src="img/samandehi.png">
                        &nbsp;
                        <img src="img/enemad.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


        <script>
            var y = window.innerHeight+"px";
            document.getElementById("drawer-menu").style.height=y;
        </script>
        <script>
            $(document).ready(function(){
                $("#close").on("click",function() {
                    $("#drawer-menu").css("display", "none");
                });
                $("#menu").on("click",function() {
                    $("#drawer-menu").css("display", "block");
                });
            })
        </script>        
    </body>
</html>