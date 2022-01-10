<?php
if (isset($_FILES['image']) && $_FILES['image']['name'] != null) {
    //xử lý ở đây
    $fileName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $ext = explode('.', $fileName); //name.jpg => [name, jpg]
    //name.png => [name,png]

    if ($ext[count($ext) - 1] != 'png') {
        echo "File upload cần phải là ảnh png";
        exit();
    }

    //1_2022
    //2_2022
    //3_2022

    $fileSize = $_FILES['image']['size'];
    if ($fileSize > 5 * 1024 * 1024) {
        echo "File upload cần phải nhỏ hơn 5mb";
        exit();
    }


    $month = date('m', time());//01 hay 1
    $year = date('Y', time());//2021
    $newDir = 'uploads/' . $month . '_' . $year;//uploads/01_2021
    if (!file_exists($newDir) || is_file($newDir)) {
        mkdir($newDir, 0777);//phân quyền theo unix
    }
    move_uploaded_file($tmpName, $newDir . '/' . time() . $fileName);


    //cache: cake
}
