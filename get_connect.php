<?php
function getConnect()
{
    $conn = mysqli_connect("127.0.0.1",
        "root", "koodinh@",
        "php_42");
    return $conn;
}

function closeConnect()
{
    mysqli_close();
}

?>