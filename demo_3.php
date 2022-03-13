<?php
 class Calculator {
     //fake overloading
     //đa hình tĩnh
     function add()
     {
         if (func_num_args() == 2) {
             //làm gì đó
             return func_get_arg(0) + func_get_arg(1);
         }else if(func_num_args() == 3){
             return func_get_arg(0) + func_get_arg(1) + func_get_arg(2);
         }
     }
 }

 $calc = new Calculator();
echo $calc->add(1,2,3);
?>