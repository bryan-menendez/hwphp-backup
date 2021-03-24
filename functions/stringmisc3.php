<?php
    /**
     * Automatically escaping strings
     * 
     * Very often you will work in situations where single quotes ', double quotes ", and backslashes \ 
     * can cause problems - databases, files, and some protocols require that you escape them 
     * with \, making \', \", and \\ respectively.
     * Addslashes() takes a string as its only parameter, 
     * and returns the same string with these offending characters escaped so that they are safe for use. 
     */

    $string = "I'm a lumberjack and I'm okay!";
    $a = addslashes($string);
    $b = addslashes($a);
    $c = addslashes($b);

    /**
     * $a: I\'m a lumberjack and I\'m okay!
     * $b: I\\\'m a lumberjack and I\\\'m okay!
     * $c: I\\\\\\\'m a lumberjack and I\\\\\\\'m okay!
     */

    /**
     * Although you can use addslashes() with databases, it's not recommended because it escapes only quotes, 
    * which leaves some other potentially dangerous text in your input. 
    * If you're looking to escape strings for databases, you should use mysqli_real_escape_string() 
    * or the equivalent for your database.
    */



    /**
     * Prettying numbers
     * 
     * Number_format() is a remarkably helpful function that takes a minimum of one parameter, 
     * the number to format, and returns that same number with grouped thousands
     * 
     * So, if you pass number_format() a parameter of "1234567", it will return "1,234,567". 
     * By default, number_format() rounds fractions - 1234567.89 becomes 1,234,568. 
     * However, you can change this by specifying the second parameter, 
     * which is the number of decimal places to include. 
     * Parameter three allows you to choose the character to use as your decimal point, 
     * and parameter four allows you to choose the character to use as your thousands separator.
     */

    $num = 12345.6789;
    $a = number_format($num); //12,346
    $b = number_format($num, 3); //12,345.679
    $c = number_format($num, 4, ',', '.'); //12.345,6789 

    /**
     * As you can imagine, number_format() is incredibly useful when it comes to formatting money 
     * for checkout pages in shopping baskets, 
     * although it is useful anywhere you need to represent large numbers -
     * adding a thousand separator invariably makes things easier to read.
     */




    /**
     * Removing tags
     * 
     * Strip_tags() is a function that allows you to strip out all HTML and PHP tags from a given string (parameter one), 
     * however you can also use parameter two to specify a list of HTML tags you want.
     */

    $input = "<blink><strong>Hello!</strong></blink>";
    $a = strip_tags($input);
    $b = strip_tags($input, "<strong><em>");



    /**
     * Strcmp(), and its case-insensitive sibling strcasecmp(), 
     * is a quick way of comparing two words and telling whether they are equal, 
     * or whether one comes before the other. It takes two words for its two parameters, and 
     * 
     * returns -1 if word one comes alphabetically before word two, 
     * 1 if word one comes alphabetically after word two, 
     * or 0 if word one and word two are the same. 
     * 
     */

    $string1 = "foo";
    $string2 = "bar";
    $result = strcmp($string1, $string2);

    switch ($result) {
        case -1: print "Foo comes before bar"; break;
        case 0: print "Foo and bar are the same"; break;
        case 1: print "Foo comes after bar"; break;
    }

    /**
     * strcmp() and == are equally fast, but
     * One thing, though: 
     * using ==, you get a "1" if two strings match, 
     * whereas with strcmp() you get a 0, so be careful! 
     */




    /**
    * Padding 
    *
    * str_pad() makes a given string (parameter one) larger by X number of characters (parameter two) by adding on spaces
    *
    * string str_pad ( string input, int pad_length [, string pad_string [, int pad_type]])
    */

    $string = "Goodbye, Perl!";
    $a = str_pad($string, 10, '-', STR_PAD_LEFT);
    $b = str_pad($string, 10, '-', STR_PAD_RIGHT);
    $c = str_pad($string, 10, '-', STR_PAD_BOTH);

    //Note that HTML only allows a maximum of one space at any time. 
    //If you want to pad more, you will need to use "&nbsp;", the HTML code for non-breaking space. 



    /**
     * printf()
     * 
     * Printf() takes a variable number of parameters - 
     * a format string is always the first parameter, 
     * followed by zero or more other parameters of various types.
     */

    $foo = "lions, tigers, and bears";
    printf("There were %s - oh my!", $foo);

    $foo = "you";
    $bar = "the";
    $baz = "string";

    printf("Once %s've read and understood %s previous section, 
    %s should be able to use %s bare minimum %s control functions 
    to help %s make useful scripts.", $foo, $bar, $foo, $bar, $baz, $foo);



    /**
     * Parsing strings
     * 
     * void parse_str ( string input [, array store])
     * 
     * Previously we looked at a handful of the variables set for you inside the superglobal arrays, 
     * of which one was QUERY_STRING. If you recall, this is the literal text sent after the question mark 
     * in a HTTP GET request, which means that if the page requested was "mypage.php?foo=bar&bar=baz",
     * QUERY_STRING is set to "foo=bar&bar=baz".
     * 
     * The parse_str() function is designed to take a query string like that one and convert it to variables 
     * in the same way that PHP does when variables come in. 
     * The difference is that variables parsed using parse_str() are converted to global variables, 
     * as opposed to elements inside $_GET. So:
     */
    unset($foo);

    if (isset($foo)) 
        print "Foo is $foo<br />";
    else 
        print "Foo is unset<br />"; //this

    parse_str("foo=bar&bar=baz");

    if (isset($foo)) 
        print "Foo is $foo<br />"; //this
    else 
        print "Foo is unset<br />";

    /**
     * Optionally, you can pass an array as the second parameter to parse_str(), and it will put the variables into there. 
     */
    
?>