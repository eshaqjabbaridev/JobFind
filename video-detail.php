<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
        <title>آموزشگاه فنی حرفه ای عصر مهارت | آموزش بوت استرپ</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css"> 
        <link rel="stylesheet" href="css/detail.css">       
    </head>
    <body>
        <!-- Start Header -->
        <?php include "theme/header.php"; ?>
        <!--End Header-->
        <!-- MAIN -->
        <div class="container-fluid" id="jozit">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card mb-3">
                        <div id="teacher-bg"></div>
                        <img src="img/download.jfif" id="teach">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                مدرس:<br>
                                اسحاق جباری
                            </h5>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title text-right">جزییات دوره:</h6>
                            <hr class="bg-light">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 15px;font-weight: bold;"> تعداد جلسات:</td>
                                    <td class="text-left" style="font-size: 15px;font-weight: bold;"> 60جلسه</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 15px;font-weight: bold;">مدت کل دوره :</td>
                                    <td class="text-left" style="font-size: 15px;font-weight: bold;">180 ساعت</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 15px;font-weight: bold;">قیمت:</td>
                                    <td class="text-left" style="font-size: 15px;font-weight: bold;">600000 ریال</td>
                                </tr>
                            </table>
                            <a class="btn btn-success text-white" style="width: 100%;" href="#">افزودن به سبد خرید</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <video id="video" controls>
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                    </video>
                    <div class="card mb-3">
                            <div class="card-header" id="card">
                                معرفی دوره
                            </div>
                            <div class="card-body">
                                <p class="card-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                            </p>
                        </div>
                    </div>                    
                    <div class="card mb-3">
                    <div class="card-header" id="card">
                        قسمت ها
                    </div>
                    <div class="card-body">
                        <ul class="timeline">
                            <li>
                                <span class="num">1</span>
                                <b>جلسه اول: آشنایی با بوت استرپ</b>
                            </li>
                        </ul>                    
                    </div>
                    </div>
                    <div id="comment-box" class="mb-3">
                        <b>پاسخی بگذارید</b>
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>نام:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>پست الکترونیک</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label>نظر</label>
                                <textarea cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <input type="submit" value="ارسال نظر" class="btn btn-success mb-3">
                    </form>
                    </div>
                    <div id="comments">
                        <b>دیدگاه ها</b>
                        <div class="comment-body mb-3">
                        <table>
                            <tr>
                                <td>
                                    <img src="panel/asset/img/profile.jpeg" class="comment-pic">
                                    اسحاق جباری
                                    <br>
                                    1398/09/20
                                </td>
                                <td>
                                    ممنون از دوره خوبی که گذاشتید...
                                </td>
                            </tr>
                        </table>
                        </div>
                        <div class="comment-body admin mb-3">
                        <table>
                            <tr>
                                <td>
                                    <img src="panel/asset/img/profile.jpeg" class="comment-pic">
                                    بهروز منصوری
                                    <br>
                                    1398/09/21
                                </td>
                                <td>
                                    خواهش می کنم، خوشحالم که این دوره کاربردی و مفید بوده...
                                </td>
                            </tr>
                        </table>
                        </div>
                    </div>
            </div>
            </div>
        </div>
        <!-- Start Footer -->
        <?php include "theme/footer.php"; ?>