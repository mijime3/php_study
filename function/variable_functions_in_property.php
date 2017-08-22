<?php

class MyClass {

    private $func;

    public function __construct()
    {
        $this->func = function () {
            echo "called\n";
        };
    }

    public function run()
    {
        var_dump(is_callable($this->func));
        // -> true

        //$this->func();
        // -> Fatal error

        call_user_func($this->func);
        // called
    }
}

$obj = new MyClass();
$obj->run();
