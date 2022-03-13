<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Animal
{
    private $name;//tên
    protected $legs;//số chân

    public function eat()
    {
        echo $this->name . "Ăn";
    }
}

class Cockroaches extends Animal
{

    public function __construct()
    {
        //$this->name = "Tiểu Cường";
    }

    public function run()
    {
        echo $this->name . "Chạy";
        $this->legs = 8;
    }
}

//outside context
/*$tieuCuong = new Animal();
$tieuCuong->name="Tiểu Cường";
$tieuCuong->legs = 4;
$tieuCuong->eat();*/

$tieuCuong = new Cockroaches();

$tieuCuong->run();


?>