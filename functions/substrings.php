<?php
    $string = "Goodbye, Perl!";
    print $string . "\n";

    print "\n";

    /**
     * Substring will take a piece of a string, starting from the index you select, 
     * up to the amount of characters you define.
     */

    print substr($string, 1) . "\n"; //"oodbye, Perl!"
    print substr($string, 3) . "\n"; //"dbye, Perl!"
    print substr($string, 89) . "\n"; //blank

    print "\n";

    print substr($string, 5, 5) . "\n"; //"ye, P"
    print substr($string, 10, 1) . "\n";//"e"
    
    print "\n";

    /**
     * So far, so good. However, we're not finished - substr() can do more. 
     * For example, you can specify a negative number as parameter three for the length, 
     * and PHP will consider that number the amount of characters you wish to omit from the end of the string, 
     * as opposed to the number of characters you wish to copy.
     */

    print substr($string, 5, -2) . "\n"; // "ye, Per", it deleted the last 2 letters
    print substr($string, 0, -7) . "\n"; // "Goodbye", it deleted the last 7 letters
    
    /**
     *  You can also use a negative start index, 
     * in which case you start copying start characters from the end. 
     */

    print "\n";

    print substr($string, -5) . "\n"; //"Perl!"
    print substr($string, -5, 4) . "\n"; // "Perl"
    print substr($string, -5, -4) . "\n"; // "P"

?>