        <header>
            <nav>
                <ul>
                    <li><a href="index.php">خانه</a></li>
                    <li><a href="#">دوره ها</a>
                        <ul>
                            <li><a href="course-list.php">کامپیوتر</a></li>
                            <li><a href="course-list.php">حسابداری</a></li>
                            <li><a href="course-list.php">عمران</a></li>
                        </ul>
                    </li>
                    <li><a href="video-list.php">فیلم ها</a></li>
                    <li><a href="teachers.php">اساتید</a></li>
                    <li><a href="about.php">درباره ما</a></li>
                    <li><a href="connect-us.php">تماس با ما</a></li>
                </ul>
            </nav>
            <div id="logo"></div>
            <div class="shopping-cart">
                <a href="#">
                    (0) <i class="fa fa-shopping-cart"></i>
                </a>
            </div>
            <div id="user">
            <?php
            session_start();
            if (isset($_SESSION['user'])) {
                if ($_SESSION['type']==1) {
                    echo "<a href='panel/admin/dashboard.php'>داشبورد</a>";
                }
                else {
                    echo "<a href='panel/user/dashboard.php'>داشبورد</a>";
                }
            }
            else {
                echo "<a href='login.php'>ورود</a> یا <a href='register.php'>ثبت نام</a>";
            }
            ?>
            </div>
            <div id="search">
                <form>
                    <input type="text" placeholder="جستجو">
                    <input type="submit" value=""  class="btn-search">
                </form>
            </div>            
        </header>
        <!-- DEVICE HEADER -->
        <div id="device">
            <i class="fa fa-reorder" id="menu"></i>
            <div id="device-logo"></div>
            <div class="shopping-cart">
                <a href="cart.html">
                    (0) <i class="fa fa-shopping-cart"></i>
                </a>
            </div>
            <div id="device-search">
                <form>
                    <input type="text" placeholder="جستجو">
                    <input type="submit" value="" class="btn-search">
                </form>
            </div>
        </div>
        <!-- DEVICE MENU -->
        <div id="drawer-menu">
            <div id="close"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 224.512 224.512" style="enable-background:new 0 0 224.512 224.512;" xml:space="preserve">
                <polygon style="fill:#010002;" points="224.507,6.997 217.521,0 112.256,105.258 6.998,0 0.005,6.997 105.263,112.254 
                0.005,217.512 6.998,224.512 112.256,119.24 217.521,224.512 224.507,217.512 119.249,112.254 	"/>
            </svg></div>
            <ul id="menu">
                <li><a href="index.html">خانه</a></li>
                <button class="dropdown-btn">دوره ها
                    <i class="fa fa-angle-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="course-list.html">کامپیوتر</a>
                    <a href="course-list.html">حسابداری</a>
                    <a href="course-list.html">عمران</a>
                </div>                
                <li><a href="video-list.html">فیلم ها</a></li>
                <li><a href="teachers.html">اساتید</a></li>
                <li><a href="about.html">درباره ما</a></li>
                <li><a href="connect-us.html">تماس با ما</a></li>
                <li><a href="login.html">ورود</a></li>
            </ul>
        </div>