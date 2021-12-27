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
$index = 0;
while ($index < 10) {
    echo 'Hello';
    $index++;
}

echo '</br>';

do {
    echo 'Hello';
    $index++;
} while ($index < 20);

echo '</br>';
for ($i = 0; $i < 10; $i++) {
    echo 'For Loop Hello';
}
?>
</body>
</html>