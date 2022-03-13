<?php

class KhuonBanh
{
     const PI = 3.14;
     public static $material;
     public $shape = "round"; //non-static

     public static function getMaterial()
     {
         return self::$material;
     }
}

KhuonBanh::$material = "wood";
KhuonBanh::getMaterial();

$khuonBanhChung = new KhuonBanh();
$khuonBanhChung->shape = "square";

define("PI", 3.14);//huowngs hàm
echo PI;
?>