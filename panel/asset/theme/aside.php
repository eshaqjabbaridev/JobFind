<?php
if ($_SESSION['type']=="1") {
    echo "<aside class='float-right'>
    <ul id='menu'>
        <li><a href='dashboard.php'>داشبورد <i class='fa fa-dashboard float-left'></i></a></li>
        <button class='dropdown-btn'>کارآموزان <i class='fas fa-user-graduate float-left'></i></button>
        <div class='dropdown-container'>
            <a href='interns.php'>مشاهده کارآموزان</a>
            <a href='add-intern.php'>ثبت کارآموز جدید</a>
        </div>
        <button class='dropdown-btn mt-3'>مدرسین <i class='fas fa-chalkboard-teacher'></i></button>
        <div class='dropdown-container'>
            <a href='interns.php'>مشاهده مدرسین</a>
            <a href='add-intern.php'>ثبت مدرس جدید</a>
        </div>
        <button class='dropdown-btn mt-3'>دوره ها <i class='fa fa-book float-left'></i></button>
        <div class='dropdown-container'>
            <a href='courses.php'>مشاهده دوره ها</a>
            <a href='add-course.php'>ثبت دوره جدید</a>
        </div>
        <button class='dropdown-btn mt-3'>فیلم ها <i class='fa fa-youtube-play float-left'></i></button>
        <div class='dropdown-container'>
            <a href='films.html'>مشاهده فیلم ها</a>
            <a href='add-film.php'>ثبت فیلم جدید</a>
        </div>
        <button class='dropdown-btn mt-3'>شهریه <i class='fa fa-money float-left'></i></button>
        <div class='dropdown-container'>
            <a href='salaries.php'>لیست شهریه های واریز شده</a>
            <a href='salary.php'>واریز شهریه</a>
        </div>
        <button class='dropdown-btn mt-3'>آزمون <i class='fa fa-check-square-o float-left'></i></button>
        <div class='dropdown-container'>
            <a href='join-to-test.php'>لیست درخواست دهدندگان شرکت در آزمون</a>
            <a href='avg.php'>ثبت نمرات</a>
        </div>
    </ul>
    </aside>";
}
else {
    echo "<aside class='float-right'>
    <div id='profile'>
    <img src='".$rows['personal_img']."'>
    <span id='username'>".$_SESSION['user']."</span>
    </div>
    <ul id='menu'>
        <li>
            <a href='dashboard.php'>پروفایل<i class='fa fa-user float-left'></i></a>
        </li>
        <button class='dropdown-btn'>دوره ها<i class='fa fa-book float-left'></i></button>
        <div class='dropdown-container'>
            <a href='courses.php'>دوره های ثبت نام کرده</a>
            <a href='new-course.php'>ثبت نام دوره جدید</a>
        </div>
        <button class='dropdown-btn mt-3'>شهریه<i class='fa fa-money float-left'></i></button>
        <div class='dropdown-container'>
            <a href='salary-status.php'>مشاهده وضعیت شهریه</a>
            <a href='salary-pay.php'>پرداخت شهریه</a>
        </div>
        <button class='dropdown-btn mt-3'>آزمون<i class='fa fa fa-check-square-o float-left'></i></button>
        <div class='dropdown-container'>
            <a href='join-request.php'>معرفی به آزمون</a>
            <a href='avg.php'>نمرات</a>
        </div>
        <li class='mt-3'>
            <a href='downloads.php'><i class='fa fa-download float-left'></i>دانلود ها</a>
        </li>
        <li>
            <a href='buy.php'><i class='fa fa fa-shopping-cart float-left'></i>خرید ها و جزییات</a>
        </li>
        <li>
            <a href='change-password.php'><i class='fa fa fa-key float-left'></i>تعویض کلمه عبور</a>
        </li>
    </ul>
    </aside>";
}
?>