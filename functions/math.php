<?php
    /*
     * rounding numbers
     */

    $someval = 4.9;
    print ceil($someval) . "\n"; //5
    print floor($someval) . "\n";  //4

    print round(4.9) . "\n"; // 5
    print round(4.5) . "\n"; // 5
    print round(4.4999) . "\n"; // 4
    print round(4.123456, 3) . "\n"; // 4.123
    print round(4.12345, 4) . "\n"; // 4.1235
    print round(1000 / 160) . "\n"; // 6
    
    /*
     * random numbers
     */
    
    print rand(); //random number
    print rand(1,10); //random number in a range
    print mt_rand(1,100); //Mersenne Twister algorithm, more random but 50% slower
    
    print getrandmax(); //this will tell you the highets numer the rand() func will be able to give

    /*
     * others
     */
    
    abs(50); //absolute value
    abs(-12);
    
    print sqrt(25); //square root
    print sqrt(26);
    
    print pow(10,2); // 100
    print pow(10,3); // 1000
    print pow(10,4); // 10000
    print pow(-10, 4); // 10000
    
    /*
     * converting bases
     */
    
    print decbin(16); // 10000
    print dechex(232); // e8
    print hexdec(e8); // 232
    
    /*
     * Base_convert() takes three parameters:
     * a number to convert, 
     * the base to convert from, 
     * and the base to convert to. 
     * 
     * For example, the following two lines are identical
     */
    
    print decbin(16);
    print base_convert(16, 10, 2);
    
    /*
     * The latter is just a more verbose way of saying "convert the number 16 from base 10 to base 2". 
     * Given that there are only ten numbers from 0 to 9, and only 26 letters from A to Z, 
     * the maximum base we can handle is base 36. 
     * Technically it is possible to go to base 62 by differentiating between upper- and lowercase letters, 
     * but this is not supported by PHP at the current time - 
     * if you try to use a base larger than 36 you will get an error. 
     * 
     * If you are interested, MIME uses base 64 by utilising ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789 
     * as well as + and /. 
     */
    
    /*
     * constants
     */
    
    $radius = 20;
    $area = M_PI * pow($radius, 2);
    
    print $area;
?>