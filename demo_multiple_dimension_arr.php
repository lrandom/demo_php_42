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
$matrix = [
    [0, 1, 3, 4, 5],
    [2, 4, 5, 6, 7]
];
echo $matrix[0][4];//5
echo $matrix[1][2];//5


foreach ($matrix as $r) {
    foreach ($r as $c) {
        echo $c;
    }
}

$threeD = [
    [
        [
            0, 1, 2, 3
        ],
        [
            1, 2, 3, 4
        ],
        [
            4, 5, 6, 7, 8
        ]
    ]
];

echo $threeD[0][2][4];//8
foreach ($threeD as $item1) {
    foreach ($item1 as $item2) {
        foreach ($item2 as $item3) {
            echo $item3;
        }
    }
}

$mixArrMultipleDimension = [
    [
        1, 2, 3, 4
    ],
    [
        'name' => 'Luan',
        'address' => 'Quang Ninh',
        'language_code' => ['PHP', 'Java', 'JS', 'Laravel']
    ]
];

echo $mixArrMultipleDimension[1]['language_code'][0];//PHP

?>
</body>
</html>