<?php
$rootDir = str_replace("/admin/commons", "", __DIR__);
$rootDir .= "/config.php";
require_once $rootDir; //auto loading Php - PSR 4 - Laravel sử dụng
?>
<div class="container" style="margin:0px auto">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>/admin/user/list.php">User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>/admin/category/list.php">Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" href="<?php echo BASE_URL ?>/admin/product/list.php">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" href="<?php echo BASE_URL ?>/admin/order/list.php">Order</a>
        </li>
    </ul>
</div>