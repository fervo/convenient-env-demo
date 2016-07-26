<?php

namespace AppBundle;

/**
* 
*/
class Foo
{
    public function __construct($arg1, $arg2, $arg3)
    {
        var_dump($arg1);
        var_dump($arg2);
        var_dump($arg3);
    }
}
