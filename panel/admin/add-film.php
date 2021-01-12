<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
        <title>آموزشگاه فنی حرفه ای عصر مهارت | افزودن دوره</title>

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
        <?php include "../asset/theme/aside.html" ?>
                <div class="float-left" id="content">
            <div class="container-fluid">
               <div class="row mb-3">
                   <div class="col-md-12">
                       <span class="page-logo"><i class="fa fa-youtube-play"></i></span> ثبت فیلم جدید    
                   </div>
               </div>
                <div class="row">
                    <div class="col-md-12"> 
                        <form>
                            <div class="form-group">
                                <label>نام دوره:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تعداد جلسات:</label>
                                        <input type="number" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-6">                                       
                                    <label>مدرس:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label>هزینه دوره</label>
                                    <div class="input-group" style="direction: ltr;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">تومان</span>
                                        </div>
                                        <input type="text" class="form-control text-right"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">                                 
                                    <label>ویدئوی معرفی</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>عکس بند انگشتی</label>
                                    <input type="file" class="form-control">               
                                </div>
                            </div>
                            <div class="form-group">
                                <label>توضیحات دوره</label>
                                <textarea class="form-control" cols="30" rows="3"></textarea>
                            </div> 
                            <div class="form-group">
                                <label>جلسات:</label>
                                <select size="5" multiple class="custom-select" id="sarfasl">
                                </select>                                        
                            </div>
                            <div class="row mb-3">
                                    نام جلسه:
                                    <input type="text" class="form-control float-left" style="width: 30%;" id="add">
                                    فایل ویدیو:
                                    <input type="file" class="form-control float-left" style="width: 30%;" id="add">
                                    <span class="form-control text-center float-left" id="btn-add" onclick="addto()">افزودن سرفصل</span>
                                </div>
                            </div>
                            <input type="submit" value="ثبت اطلاعات" class="btn btn-outline-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- JS -->
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        
        <script>
            var y = window.innerHeight+"px";
            document.getElementsByTagName("aside").style.height=y;
        </script>
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