<?php
include_once './config.php';
include_once './dals/DalProduct.php';
$dalProduct = new DalProduct();
$lastestProducts = $dalProduct->getList(1, 8);
$topSoldProducts = $dalProduct->getListOrderBySoldCounter(1, 8);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Shop | Trang chủ</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<?php require_once './commons/nav.php';?>

<div>
    <div style="background: bisque">
        <section
                class="container md:px-0 px-5 mx-auto h-screen flex md:flex-row flex-col items-center md:justify-between justify-center">
            <div>
                <h1 class="md:text-4xl text-2xl font-bold">Book Shop - Bán mọi loại sách</h1>
                <p class="md:text-3xl text-xl">Hãy mua sách tại book shop ngay để được giảm giá 30%</p>
                <button role="button"
                        class="mt-3 md:w-2/3 w-full p-3 md:text-lg text-base uppercase text-gray-200 bg-white"
                        style="color: burlywood">Mua ngay
                </button>
            </div>
            <div>
                <img src="assets/img/top-banner.webp" alt="Book Shop - Bán mọi loại sách"/>
            </div>
        </section>
    </div>

    <section class="container md:px-0 px-5 mx-auto mt-10">
        <h2 class="text-3xl font-bold">Sách mới xuất bản</h2>
        <div class="mt-5 grid md:grid-cols-4 grid-cols-1 gap-5">
            <?php
            foreach ($lastestProducts as $product) {
                ?>
                <article class="col-span-1">
                    <div class="shadow rounded bg-white">
                        <img src="<?php echo BASE_URL . $product->image; ?>" class="w-full h-full object-cover"
                             alt="<?php echo $product->name; ?>"/>

                        <div class="p-2 space-y-2">
                            <h3 class="font-semibold text-xl"><?php echo $product->name; ?></h3>
                            <p>Mô tả ngắn về sản phẩm</p>
                            <a href="add-to-cart.php?id=<? echo $product->product_id; ?>" role="button"
                               class="w-full p-3 block text-lg uppercase text-gray-200"
                               style="background: burlywood">Thêm vào giỏ hàng
                            </a>
                        </div>
                    </div>
                </article>
                <?php
            }
            ?>
        </div>
    </section>

    <section class="container mx-auto mt-10">
        <h2 class="text-3xl font-bold">Sách bán chạy nhất</h2>
        <div class="mt-5 grid md:grid-cols-4 grid-cols-1 gap-5">
            <?php
            foreach ($topSoldProducts as $product) {
                ?>
                <article class="col-span-1">
                    <div class="shadow rounded bg-white">
                        <img src="<?php echo BASE_URL . $product->image; ?>" class="w-full h-full object-cover"
                             alt="<?php echo $product->name; ?>"/>

                        <div class="p-2 space-y-2">
                            <h3 class="font-semibold text-xl"><?php echo $product->name; ?></h3>
                            <p>Mô tả ngắn về sản phẩm</p>
                            <button role="button" class="w-full p-3 text-lg uppercase text-gray-200"
                                    style="background: burlywood">Thêm vào giỏ hàng
                            </button>
                        </div>
                    </div>
                </article>
                <?php
            }
            ?>
        </div>
    </section>
</div>

<footer></footer>
</body>
</html>