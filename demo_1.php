<?php
class Human{
    var $eyeColor;//màu mắt
    var $hairColor;//màu tóc
    var $height;//chiều cao
    var $name;//tên

    //magic method, magic constant
    function __construct($eyeColor, $hairColor, $height, $name){
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->height = $height;
        $this->name = $name;

        echo "Khởi tạo đối tượng " . $this->name;

    }

    function eat()
    {
        echo $this->name." Ăn";
    }

    function sleep()
    {
        echo $this->name." Ngủ";
    }
}

//tính kế thừa, tại sử dụng lại mã nguồn
//0 hỗ trợ đa kế thừa
class Citizen extends Human
{
    var $id;// CMND
    var $address;//địa chỉ
    var $dob;//ngày sinh
}
class Employee extends Human
{
    var $id;//CMND
    var $address;//địa chỉ
    var $dob;//ngày sinh
}

class Student extends Citizen
{
    var $id;//CMND
    var $address;//địa chỉ
    var $dob;//ngày sinh
}

//instance of Class
//object = instance
$luan = new Human("Đen", "Đen", "172cm", "Luân");
/*$luan->name = "Luan";
$luan->eyeColor = "Đen";
$luan->hairColor = "Đen";
$luan->height = "172cm";*/
$luan->eat();

$nam = new Human("Đen","Vàng","175cm","Nam");
/*$nam->name = "Nam";
$nam->eyeColor = "Đen";
$nam->hairColor = "Vàng";
$nam->height = "175cm";*/
$nam->sleep();

//
//1. Kế thừa
//2. Đóng gói
//3. Trừu tượng
//4. Đa hình (đa hình tĩnh (0 có) , đa hình động (có)
//Đa hình tĩnh -> nạp chồng phương thức (Overloading Method)
//strong type
//loosely type
//Đa hình động, đa hình trong môi trường thực thi -> ghi đè phương thức (Overriding Method) - PHP