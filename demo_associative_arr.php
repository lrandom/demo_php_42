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
$arr1 = array("name" => "Nguyen Thanh Luan", "age" => 20);
echo $arr1["name"];//Nguyen Thanh Luan
echo $arr1["age"];//20

$arr2 = [
    "name" => "Nguyen Thanh Nam",
    "age"=>28
];

echo $arr2['name'];
echo $arr2['age'];

$arr3 = [];
$arr3['name']='Trần Hoài Nam';
$arr3['age'] = '30';

foreach ($arr3 as $k => $v) {
    echo '<div>' . $k . ':' . $v.'</div>';
}


?>
</body>
</html>