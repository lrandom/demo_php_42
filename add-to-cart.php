<?php
session_start();
require_once 'dals/DalProduct.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $dalProduct = new DalProduct();
    $product = $dalProduct->get($id);
    if (isset($_SESSION['cart'])) {
        //đã có giỏ hàng
        //kiểm tra sản phẩm đã có trong giỏ hàng chưa
        $cart = $_SESSION['cart'];
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $id) {
                $cart[$i]['quantity'] += 1;
                $_SESSION['cart'] = $cart;
                header('location: cart.php');
                return;
            }
        }

        array_push($cart, [
            'id' => $id,
            'product' => $product,
            'quantity' => 1
        ]);
        $_SESSION['cart']=$cart;
    } else {
        //chưa có giỏ hàng
        //tạo giỏ hàng
        $cart = [];
        array_push($cart, [
            'id' => $id,
            'product' => $product,
            'quantity' => 1
        ]);
        $_SESSION['cart'] = $cart;
    }
    header('location: cart.php');
}
?>