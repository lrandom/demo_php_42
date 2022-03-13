<?php
class Human{
    var $eyeColor;//màu mắt
    var $hairColor;//màu tóc
    var $height;//chiều cao
    var $name;//tên

    function eat()
    {
        echo $this->name." Ăn";
    }

    function sleep()
    {
        echo $this->name." Ngủ";
    }
}

$luan = new Human();
$luan->name = "Luan";
$luan->eyeColor = "Đen";
$luan->hairColor = "Đen";
$luan->height = "172cm";
$luan->eat();

$nam = new Human();
$nam->name = "Nam";
$nam->eyeColor = "Đen";
$nam->hairColor = "Vàng";
$nam->height = "175cm";
$nam->sleep();