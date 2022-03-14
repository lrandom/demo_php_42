<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_42',
        'root',
        'koodinh@');
    //cho phép bắt lỗi exception khi thực thi các câu lệnh SQL thông qua PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query('SET NAMES "UTF8"');//cho phép lấy ra các dữ liệu có dấu
    echo "Kết nối thành công";
    $stm = $pdo->query("SELECT * FROM users");
    $stm->setFetchMode(PDO::FETCH_OBJ);
    while ($row = $stm->fetch()) {
        echo $row->id . ' - ' . $row->name . '<br>';
    }
    $pdo = null;//đóng kết nối
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>