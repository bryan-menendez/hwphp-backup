<?php
    /**
     * Reading a global variable from inside a function
     */

    //global $bar;
    $bart = "hello";

    function foo() {
        $GLOBALS['bart'] = "wombat";
    }

    $bart = "baz";
    foo();
    print $bar;

?>