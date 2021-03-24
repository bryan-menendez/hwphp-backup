<?php
    /**
     * Basic definition
     */

    $myarray = array("Apples", "Oranges", "Pears");
    $size = count($myarray);
    print_r($myarray);

    /**
     * you can provide a second parameter to print_r(), which, 
     * if set to true, will make print_r() pass its output back as its return value, and not print anything out
     */

    /**
     * There is a similar function to print_r(), which is var_dump(). It does largely the same thing, but 
     * a) prints out sizes of variables, 
     * b) does not print out non-public data in objects, and 
     * c) does not have the option to pass a second parameter to return its output.
    */

    //you can also declare arrays like 

    $myarray = array("Apples", "Oranges", "Pears");
    $myarray = ["Apples", "Oranges", "Pears"];
    $myarray = array (
        0 => 'Apples',
        1 => 'Oranges',
        2 => 'Pears',
    );



    /**
     * Associative arrays
     */

    /**
     * As well as choosing individual values, you can also choose your keys - 
     * in the fruits code above we just specify values, but we could have specified keys along with them
     * 
     * Btw, PHP converts floats to integers before they are used, which essentially rounds them down.
     * If you really want to use floating-point numbers as your keys, pass them in as strings and read them as such
    */

    $myarray = array("a"=>"Apples", "b"=>"Oranges", "c"=>"Pears");
    var_dump($myarray);

    $array["1.5"] = "foo";
    $array["1.6"] = "foo";
    var_dump($array);

    /**
     * There is another popular way to create and manage arrays, and it uses brackets [ ] to mean "add to array", 
     * earning it the name "the array operator". 
     * Using this functionality, you can both create arrays and add to existing arrays
     */

    $array[] = "Foo";
    $array[] = "Bar";
    $array[] = "Baz";
    var_dump($array);


    /**
     * Iterating arrays
     */

    //classic for loop
    for ($i = 0; $i < count($array); ++$i) {
        print $array[$i];
    }

    //basic foreach
    foreach($array as $val) {
        print $val;
    }

    //foreach with keys
    foreach ($array as $key => $val) {
        print "$key = $val\n";
    }

    /**
     *  List() is a function that does the opposite of array() - it takes an array, 
     * and converts it into individual variables. Each() takes an array as its parameter, 
     * and returns the current key and value in that array before advancing the array cursor.
     */
    while (list($var, $val) = each($array)) {
        print "$var is $val\n";
    }

?>
