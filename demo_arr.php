<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$arr = array(1, 2, 3, 5, 4, 6);
for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . '</br>';
}


$arr2 = [2, 3, 4, 5, 6, 7];
for ($i = 0; $i < count($arr2); $i++) {
    echo $arr2[$i] . '</br>';
}

$arr3 = [];
$arr3[] = 2;
$arr3[] = 4;
$arr3[] = 3;
foreach ($arr3 as $item) {
    echo $item;
}
?>
</body>
</html>