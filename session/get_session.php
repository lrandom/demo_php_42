<?php
session_start();



$_SESSION['name'] = "sss";

session_destroy();
print_r($_SESSION);

/*if (isset($_SESSION['user'])) {
    echo $_SESSION['user']['user_name'];
    echo $_SESSION['user']['email'];
}*/
