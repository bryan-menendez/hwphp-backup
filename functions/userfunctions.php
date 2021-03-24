<?php
    /**
     * Basic function 
     */

    function foo() {
        return 1;
    }

    print foo();

    /**
     * Parameters
     */

    function multiply($num1, $num2) {
        $total = $num1 * $num2;
        return $total;
    }

    $mynum = multiply(5, 10);

    /**
     * Passing by reference
     */

    //by value
    function square11($number) {
        return $number * $number;
    }

    $val = square1($val);

    //by reference
    function square2(&$number) {
        $number = $number * $number;
    }

    square2($val);

    /**
     * Returning by reference
     */

    function &square1($number) {
        return $number * $number;
    }

    $val =& square1(10);

    /**
     * Default parameters
     */

    function doFoo($FirstName = "holo", $LastName = "Smith") 
    { 
        print $FirstName . " " . $LastName;
    }

    doFoo();
    doFoo("Paul", "cachero");
    doFoo("Andrew");

    /**
     * Variable parameter counts
     * 
     * int func_num_args ( )
     * mixed func_get_arg ( int arg_num)
     * array func_get_args ( )
     */

    /**
     * To get the number of arguments that were passed into your function, call func_num_args() and read its return value. 
     * To get the value of an individual parameter, use func_get_arg() and pass in the parameter number you want to retrieve 
     * to have its value returned back to you. Finally, func_get_args() returns an array of the parameters that were passed in. 
     */ 

    function some_func($a, $b) {
        for ($i = 0; $i < func_num_args(); ++$i) {
            $param = func_get_arg($i);
            echo "Received parameter $param.\n";
        }
    }

    function some_other_func($a, $b) {
        $param = func_get_args();
        $param = join(", ", $param);
        echo "Received parameters: $param.\n";
    }

    some_func(1,2,3,4,5,6,7,8);
    some_other_func(1,2,3,4,5,6,7,8);



    /**
     * Variable scope in functions
     */

    function scoper() {
        $barr = "wombat";
    }

    $barr = "baz";
    scoper();
    print $barr;

?>