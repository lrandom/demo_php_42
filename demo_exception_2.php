<?php

class NumberInputLessThanZeroException extends Exception
{
    public function __construct($message = "")
    {
        parent::__construct("Number Less Than Zero Exception");
    }
}

function inputA($a)
{
    if ($a < 0) {
        throw new NumberInputLessThanZeroException();
    }

    if ($a < 10) {
        throw new Exception("Number Less Than 10");
    }
}

//multiple exception
try {
    inputA(-1);
} catch (NumberInputLessThanZeroException $e) {
    echo "Number Less Than Zero Exception";
    echo $e->getMessage();
} catch (Exception $e) {
    echo "Exception";
    echo $e->getMessage();
}