<?php
function handleException(Exception $ex)
{
    echo "Lỗi rồi bạn ơi";
}

set_exception_handler('handleException');

throw  new Exception('Alo');

echo "HIHI";