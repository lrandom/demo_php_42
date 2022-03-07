<?php
/*function total($a,$b=10)
{
  return $a+$b;
}

echo total(10);*///30

//tryền theo theo tham chiếu, truyền theo tham trị

//truyền theo tham trị
/*function demo($a)
{
    $a = 10;
}

$input = 20;
demo($input);
echo $input; *///20

//truyền theo tham chiếu
/*function demo2(&$a)
{
    $a = 10;
}
demo2($input);
echo $input; *///10

//lambda
$input = 20;
$demo3 = function () use ($input) {
    echo "HIHI";
    echo $input;
};
$demo3();

//closure in php 7

//callback function
function higherOrderFn($fn,$a,$b)
{
    $total = $a+$b;
    $fn($total);
}

higherOrderFn(function ($total) {
   echo $total;
},10,20);

higherOrderFn(function ($total){
    $total += 20;
    echo $total;
},10,20);