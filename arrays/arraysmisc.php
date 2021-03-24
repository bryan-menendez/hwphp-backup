<?php
    /**
     * Multidimensional arrays
     */

    $capitalcities['England'] = array("Capital"=>"London", "Population"=>40000000, "NationalSport"=>"Cricket");
    $capitalcities['Wales'] = array("Capital"=>"Cardiff", "Population"=>5000000, "NationalSport"=>"Rugby");
    $capitalcities['Scotland'] = array("Capital"=>"Edinburgh", "Population"=>8000000, "NationalSport"=>"Football");
    var_dump($capitalcities);



    /**
     * Array cursor
     * 
     * mixed reset ( array array)
     * mixed end ( array array)
     * mixed next ( array array)
     * mixed prev ( array array)
     */




    /**
     * Holes in arrays
     */

    $array["a"] = "Foo";
    $array["b"] = "";
    $array["c"] = "Baz";
    $array["d"] = "Wom";
    print end($array);

    while($val = prev($array)) {
        print $val;
    }

    /**
     * As you can see, it is fairly similar to the previous example -
     * it should iterate through an array in reverse, printing out values as it goes. 
     * However, there is a problem - the value at key "b" is empty, and it just so happens that 
     * both prev() and next() consider an empty value to be the sign that the end of the array has been reached, 
     * and so will return false, prematurely ending the while loop. 
     */

    $array["a"] = "Foo";
    $array["b"] = "";
    $array["c"] = "Baz";
    $array["d"] = "Wom";

    while (list($var, $val) = each($array)) {
        print "$var is $val\n";
    }

    /**
     * The way around this is the same way around the problems inherent to using for loops with arrays, 
     * and that is to use each() to properly iterate through your arrays, 
     * as each() will cope fine with empty variables and unknown keys. 
     */



    /**
     * Saving arrays
     * 
     * string serialize ( mixed value)
     * mixed unserialize ( string input)
     * string urlencode ( string text)
     * string urldecode ( string encoded)
     * 
     * Serialize() converts an array, given as its only parameter, into a normal string that you can save in a file, 
     * pass in a URL, etc. Unserialize() is the opposite of serialize() - it takes a serialize()d string 
     * and converts it back to an array.
     * 
     * Urlencode() and urldecode() also work in tandem, and convert the string that is sent to them 
     * as their only parameter into a version that is safe to be passed across the web. 
     * All characters that aren't letters and numbers get converted into web-safe codes 
     * that can be converted back into the original text using urldecode().
     * 
     * Passing arrays across pages is best done using urlencode() and urldecode(), 
     * however you should consider using them both on any data you pass across the web, 
     * just to make sure there are no incompatible characters in there. 
     */


?>