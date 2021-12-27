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
/*$age = 16;
if ($age <= 12) {
    echo 'Bạn là nhi đồng';
}

if ($age <= 12) {
    echo 'Bạn là nhi đồng';
} else {
    echo 'Bạn là thanh thiếu niên';
}

if ($age <= 12) {
    echo 'Bạn là nhi đồng';
} else if ($age >= 13 && $age <= 18) {
    echo 'Bạn là thanh thiếu niên';
} else if ($age >= 19 && $age <= 30) {
    echo 'Bạn là thanh niên';
} else if ($age >= 30) {
    echo 'Bạn là trung niên';
}

if ($age <= 18) {
    if ($age <= 12) {
        echo 'Bạn là nhi đồng';
    }
}*/

$weather = "Sunny";
switch ($weather) {
    case "Sunny":
        echo "Đi đá bóng";
        break;

    case "Rainny":
        echo "Ở nhà ngủ";
        break;

    case "Storm":
        echo "Ra ngoài checkin";
        break;
}
?>
</body>
</html>