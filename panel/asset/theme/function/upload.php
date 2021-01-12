<?php
function upload($file) {
    global $target_dir;
    $target_dir = "../../asset/pics/"; //مسیر نهایی آپلود فایل
    $target_file = $target_dir.basename($_FILES[$file]["name"]); //نام نهایی فایل
    $uploadOk = 1; //اعلان عدم وجود خطا در فایل
    $imageFileType = strtolower(pathinfo( $target_file, PATHINFO_EXTENSION));
    $check = getimagesize( $_FILES[$file]["tmp_name"] );
    if ( $check !== false ) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        $err=1;
    }
    if ($uploadOk == 0) {
        echo "Error";
    }
    else {
        move_uploaded_file($_FILES[$file]["tmp_name"], $target_file);
    }
}
?>
