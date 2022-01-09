<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$fakeProducts = [
    [
        'id' => 1,
        'name' => 'Nike Air Max 200',
        'price' => 100,
        'image' => 'https://via.placeholder.com/150x150'
    ],
    [
        'id' => 2,
        'name' => 'Adidas NMD',
        'price' => 100,
        'image' => 'https://via.placeholder.com/150x150'
    ],
    [
        'id' => 3,
        'name' => 'Nike Air Jordan',
        'price' => 100,
        'image' => 'https://via.placeholder.com/150x150'
    ],
    [
        'id' => 4,
        'name' => 'Off-White x Nike',
        'price' => 300,
        'image' => 'https://via.placeholder.com/150x150'
    ],
    [
        'id' => 5,
        'name' => 'Puma Suede',
        'price' => 300,
        'image' => 'https://via.placeholder.com/150x150'
    ]
];

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; //lấy cái id
    if (isset($_SESSION['cart'])) {
        //đã có giỏ hàng
        $cartItems = $_SESSION['cart'];
        $flag = false;
        for ($i = 0; $i < count($cartItems); $i++) {
            if ($cartItems[$i]['id'] == $id) {
                $cartItems[$i]['quantity']++;
                $flag = true;
            }
        }
        if ($flag) {
            //sản phẩm đã có trong giỏ hàng
            $_SESSION['cart'] = $cartItems;
        } else {
            //sản phẩm chưa có trong giỏ hàng
            //tìm sản phẩm trong fake data
            for ($i = 0; $i < count($fakeProducts); $i++) {
                if ($fakeProducts[$i]['id'] == $id) {
                    $product = $fakeProducts[$i];
                    $product['quantity'] = 1;
                    array_push($cartItems, $product);
                    $_SESSION['cart'] = $cartItems;
                    break;
                }
            }
        }
    } else {
        //chưa có giỏ hàng
        for ($i = 0; $i < count($fakeProducts); $i++) {
            if ($fakeProducts[$i]['id'] == $id) {
                $product = $fakeProducts[$i];
                $product['quantity'] = 1;
                $cartItems = [];
                array_push($cartItems, $product);
                $_SESSION['cart'] = $cartItems;
                break;
            }
        }
    }
}
//chuyển hướng sang trang cart.php
header('Location: cart.php');
?>


