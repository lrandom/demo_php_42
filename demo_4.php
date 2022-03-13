<?php

class ParentA
{
    public function sayHello()
    {
        echo "Hello from ParentA class";
    }
}

class ChildrenA extends ParentA
{

    //ghi đè phương thức
    public function sayHello()
    {
        echo "Hello from ChildrenA class";
    }
}

$child = new ChildrenA();
$child->sayHello();//trình biên dịch ko xác định đc sayHello nào


?>