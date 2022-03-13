<?php

abstract class A
{
    abstract function foo();

    abstract function bar();

    function hello()
    {
        echo "Hello World";
    }
}

class B extends A
{
    function foo()
    {
        // TODO: Implement foo() method.
        echo "foo";
    }

    function bar()
    {
        // TODO: Implement bar() method.
        echo "bar";
    }
}

interface ICrud
{
    public function create();
    public function read();
    public function update();
    public function delete();
}

interface IStudent
{
    public function read();
}

//đa hình
class Student implements ICrud, IStudent
{
    public function create()
    {
        // TODO: Implement create() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

}

?>