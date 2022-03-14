<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_42',
        'root',
        'koodinh@');
    //cho phép bắt lỗi exception khi thực thi các câu lệnh SQL thông qua PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query('SET NAMES "UTF8"');//cho phép lấy ra các dữ liệu có dấu
    echo "Kết nối thành công";

    // $pdo->exec();//thực sql mà ko trả về kết quả
    //$pdo->query();//thực sql mà trả về kqua, select

    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");


   // $pdo = null;//đóng kết nối
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>