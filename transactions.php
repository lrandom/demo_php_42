<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_42', 'root', 'koodinh@');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');

    PDO::beginTransaction(); //thông báo bắt đầu một giao dịch (chạy nhiều lệnh SQL), tắt chế độ auto-commit trong CSDL
    //auto commit là khi thực thi câu lệnh SQL thì sẽ ghi có vào CSDL luôn

    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('Nguyễn Văn A','Hà Nội', '0987654321', 20)");

    PDO::commit(); //thực thi các lệnh SQL trong giao dịch ( ghi có trong CSDL)
}catch (PDOException $e){

    ///CHẠY VỀ ĐÂY NẾU BẤT KỲ CÂU LỆNH NÀO CÓ LỖI
    PDO::rollBack(); //hủy bỏ tất cả các câu lệnh SQL đã chạy trong giao dịch
    echo 'Connection failed: ' . $e->getMessage();
}
?>