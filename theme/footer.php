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
                    <div class="col-md-4 text-center"> <img src="../img/footer.png"> </div>
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
            $(document).ready(function(){
                $("#show").on('click',function(){
                    $("#pass").attr("type","text");
                    $("#hide").css("display","block");
                    $("#show").css("display","none");
                })
                $("#hide").on('click',function(){
                    $("#pass").attr("type","password");
                    $("#hide").css("display","none");
                    $("#show").css("display","block");
                })
            })
        </script>    
    </body>
</html>