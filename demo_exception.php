<?php
function total($a,$b)
{
    if($a<0 || $b<0)
    {
        throw new Exception("Invalid Input, Both values should be positive");
    }
    return $a+$b;
}


//exception handling - xử lý ngoại lệ
try {
    echo total(-2, -3);//fata error
}catch (Exception $exception)
{
    //echo $e->getMessage();
    echo 'Vui lòng thử lại, nhập vào hai số dương';
}
echo total(2, 3);