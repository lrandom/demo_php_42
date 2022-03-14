<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_42', 'root', 'koodinh@');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');

/*    $name = "Nguyễn Văn A";
    $address = "Hà Nội";
    $age = 20;
    $phone = "09192889";

    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('$name','$address', '$phone', $age)");

    $name = "Nguyễn Văn B";
    $address = "Hải Phòng";
    $age = 19;
    $phone = "09192889";
    $pdo->exec("INSERT INTO users(name,address,phone,age) 
                 VALUES('$name','$address', '$phone', $age)");*/

/*    $prepareStm = $pdo->prepare("INSERT INTO users(name,address,phone,age)
                 VALUES(:name,:address, :phone, :age)");
    $prepareStm->bindParam(':name', $name);
    $prepareStm->bindParam(':address', $address);
    $prepareStm->bindParam(':phone', $phone);
    $prepareStm->bindParam(':age', $age);*/


    $prepareStm = $pdo->prepare("INSERT INTO users(name,address,phone,age) 
                 VALUES(?,?,?,?)");
    $prepareStm->bindParam(1, $name);
    $prepareStm->bindParam(2, $address);
    $prepareStm->bindParam(3, $phone);
    $prepareStm->bindParam(4, $age);

    $name = "Nguyễn Văn A";
    $address = "Hà Nội";
    $age = 20;
    $phone = "09192889";
    $prepareStm->execute();

    $name = "Nguyễn Văn B";
    $address = "Hải Phòng";
    $age = 19;
    $phone = "09192889";
    $prepareStm->execute();

    $name = "Nguyễn Văn C";
    $address = "Hải Phòng";
    $age = 19;
    $phone = "09192889";
    $prepareStm->execute();
}catch (PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
}
?>