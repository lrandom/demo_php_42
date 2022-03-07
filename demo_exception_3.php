<?php

//re-throwing exception
try {
    try {
        throw new Exception('This is a custom exception');
    } catch (Exception $exception) {
        throw $exception;
    }
}catch (Exception $exception) {
    echo 'Exception: ' . $exception->getMessage();
}
