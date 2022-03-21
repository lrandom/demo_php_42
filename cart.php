<?php
session_start();
include_once './config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Shop | Trang giỏ hàng</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php require_once './commons/nav.php'; ?>
<div class="mt-24">
    <div class="container mx-auto">
        <h1 class="text-center text-black text-2xl font-bold ">Giỏ hàng</h1>
        <?php
        //var_dump($_SESSION['cart']);
        ?>

        <?php
        if (isset($_SESSION['cart']) && $_SESSION['cart'] != null){
            ?>
            <div class="grid grid-cols-6">
                <div>Ảnh sp</div>
                <div>Tên sp</div>
                <div>Giá</div>
                <div>Số lượng</div>
                <div>Tổng giá</div>
                <div>Thao tác</div>

                <div class="col-span-6 border-b my-5"></div>
                <?php foreach ($_SESSION['cart'] as $cartItem) {
                    ?>
                    <div class="col-span-1">
                        <img src="<?php echo BASE_URL . $cartItem['product']->image; ?>" class="h-18 object-cover"
                             alt="<?php echo $cartItem['product']->name; ?>"/>
                    </div>
                    <div class="col-span-1 font-bold"><?php echo $cartItem['product']->name; ?></div>
                    <div><?php echo $cartItem['product']->price; ?></div>
                    <div>
                        <a href="" role="button" class="w-10 px-5 py-2 border">+</a>
                        <span>
                            <?php echo $cartItem['quantity']; ?>
                        </span>
                        <a role="button" class="w-10 px-5 py-2 border">-</a>
                    </div>
                    <div><?php echo $cartItem['product']->price * $cartItem['quantity']; ?></div>
                    <div>
                        <a href="" role="button" class="w-10 px-5 py-2 border">Xoá</a>
                    </div>
                    <div class="col-span-6 border-b my-5"></div>
                    <?php
                } ?>
            </div>
            <?php
        }else{
        ?>
        <div class="text-center">
            <h1 class="text-2xl">Giỏ hàng trống</h1>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>