<?php
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
]

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto">
    <nav class="text-center">
        Shoes Shop
    </nav>

    <div class="grid grid-cols-3 gap-6">
        <?php
        foreach ($fakeProducts as $fakeProduct) {
            ?>
            <div class="col-span-1">
                <div class="bg-white rounded border border-2 space-y-2">
                    <img class="w-full cover h-60" src="<?php echo $fakeProduct['image']; ?>" alt="">

                    <div class="p-2 space-y-2">
                        <h4 class="font-bold text-xl"><?php echo $fakeProduct['name']; ?></h4>
                        <p class="text-sm"><?php echo $fakeProduct['price']; ?></p>
                        <a href="add-product-to-cart.php?id=<?php echo $fakeProduct['id']; ?>"
                           class="w-full block bg-blue-500 p-2 rounded text-white text-center">Add to cart</a>
                    </div>

                </div>
            </div>
            <?php
        }
        ?>

    </div>

    <footer>
        Copyright &copy; Shoes Shop 2020
    </footer>
</div>
</body>
</html>

