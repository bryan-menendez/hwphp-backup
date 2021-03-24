<?php
    /**
     * Str_replace() is a very easy way to find and replace text in a string. 
     * Case sensitive
     */

    $string = "An infinite number of monkeys";
    $newstring = str_replace("monkeys", "giraffes", $string);
    print $newstring . "\n";

    /**
     * str_ireplace() is case insensitive
     */
    
    $string = "An infinite number of monkeys";
    $newstring = str_ireplace("Monkeys", "giraffes", $string);
    print $newstring . "\n";

    /**
     * When used, the fourth parameter is passed by reference, 
     * and PHP will set it to be the number of times your string was found and replaced. 
     */

    $string = "He had had to have had it.";
    $newstring = str_replace("had", "foo", $string, $count);
    print "$count changes were made.\n";
?>