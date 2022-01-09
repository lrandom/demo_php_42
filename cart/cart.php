<?php
session_start();
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    if ($_GET['id'] && $_GET['action']) {
        $id = $_GET['id'];
        $action = $_GET['action'];
        switch ($action) {
            case 'updateQuantity':
                $step = $_GET['step'];
                if (is_numeric($step)) {
                    if ($step > 0) {
                        for ($i = 0; $i < count($cart); $i++) {
                            if ($cart[$i]['id'] == $id) {
                                $cart[$i]['quantity'] += $step;
                                break;
                            }
                        }
                    } else {
                        for ($i = 0; $i < count($cart); $i++) {
                            if ($cart[$i]['id'] == $id && $cart[$i]['quantity'] > 1) {
                                $cart[$i]['quantity'] += $step;
                                break;
                            }

                        }
                    }
                }
                $_SESSION['cart'] = $cart;
                break;

            case 'delete':
                $index = -1;
                for ($i = 0; $i < count($cart); $i++) {
                    if ($id == $cart[$i]['id']) {
                        $index = $i;
                        break;
                    }
                }
                if ($index >= 0) {
                    array_splice($cart, $index, 1);
                }
                $_SESSION['cart'] = $cart;
                break;
        }

    }
}
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
    <h1 class="text-center">
        Cart
    </h1>
    <?php
    if (isset($cart)) {
        ?>
        <table class="table-fixed">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Price*Quantity</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $cartItem) { ?>
                <tr>
                    <td><?php echo $cartItem['name'] ?></td>
                    <td><?php echo $cartItem['price'] ?></td>
                    <td><?php echo $cartItem['quantity'] ?></td>
                    <td>
                        <a class="bg-blue-500 text-white p-2 font-normal"
                           href="?action=updateQuantity&id=<?php echo $cartItem['id']; ?>&step=1">+</a>
                        <?php echo $cartItem['quantity'] * $cartItem['price'] ?>
                        <a href="?action=updateQuantity&id=<?php echo $cartItem['id']; ?>&step=-1"
                           class="bg-blue-500 text-white p-2 font-normal">-</a>
                    </td>
                    <td>
                        <a href="?action=delete&id=<?php echo $cartItem['id'] ?>"
                           class="bg-red-500 text-white p-2 font-normal">Delete Item</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>


        <div>
            <div>
                SubTotal: <?php
                $subTotal = 0;
                foreach ($cart as $cartItem) {
                    $subTotal += $cartItem['price'] * $cartItem['quantity'];
                }
                echo $subTotal;
                ?>
            </div>

            <div>
                Tax: 10%
            </div>

            <div>
                Total: <?php echo ($subTotal * 10) / 100 + $subTotal; ?>
            </div>
        </div>

        <?php
    } else {
        ?>
        <p>Cart is empty</p>
        <?php
    }
    ?>

    <style>
        table {
            width: 100%;
            margin: 0px auto;
        }

        table tr, table td {
            border: 1px solid #cdcdcd;
            padding: 20px;
        }

        table tr {

        }
    </style>
</div>
</body>
</html>
