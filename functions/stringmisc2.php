<?php
    /**
     * Wrapping text manually
     */


    /**
     * Although web pages wrap text automatically, there are two situations when you might want to wrap text yourself:
     * When printing to a console as opposed to a web page, text does not wrap automatically. 
     * Therefore, unless you want your users to scroll around a lot, it is best to wrap text for them.
     * When printing to a web page that has been designed to exactly accommodate a certain width of text,
     * allowing browsers to wrap text whenever they want will likely lead to the design getting warped.
     * 
     * If you pass a sentence of text into wordwrap() with no other parameters, 
     * it will return that same string wrapped at the 75-character mark using "\n" for new lines. 
     * However, you can pass both the size and new line marker as parameters two and three if you want to.
     */

    $text = "Word wrap will split this text up into smaller lines, which makes for easier reading and neater layout.";
    $text = wordwrap($text, 20, "<br />");
    print $text;


    
    /**
     * String letter case
     */

    /**
     * Strtoupper() is part of a small family of functions that affect the case of characters of strings. 
     * Strtoupper() takes one string parameter, and returns that string entirely in uppercase. 
     * Other variations include strtolower(), to convert the string to lowercase, 
     * ucfirst() to convert the first letter of every string to uppercase, 
     * and ucwords(), to convert the first letter of every word in the string to uppercase. 
     */

    $string = "i like to program in PHP";
    $a = strtoupper($string);
    $b = strtolower($string);
    $c = ucfirst($string);
    $d = ucwords($string);
    $e = ucwords(strtolower($string));

    
?>