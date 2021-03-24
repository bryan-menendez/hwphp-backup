<?php

    /**
     * Measuring a string
     */

    print strlen("Foo") . "\n";



    /**
     * Counting letters and words
     */

    $str = "This is a test, only a test, and nothing but a test.";
    //count_chars counts the chars on a string and returns an array of 255 elements with its frequency
    //
    $a = count_chars($str, 1); //minimum of 1 occurrence
    $b = count_chars($str, 2); //minimum of 2...

    //By default, it just returns the number of unique words that were found in the string.
    $d = str_word_count($str);
    // However, if you pass 1 as the second parameter it will return an array of the words found, 
    //and passing 2 does the same, except the key of each word will be set to the position that word was found inside the string.
    $c = str_word_count($str, 2);
    print_r($a);
    print_r($b);
    print_r($c);



    /**
     * Finding a string within a string
     */

    //strpos() will return the index where it was found
    //or false if not found
    $string = "This is a strpos() test";
    print strpos($string, "a") . "\n";

    //although, if the index returned is 0 and you compare it using ==
    //it will be interpreted as "false" by php
    //you should use === in that case

    $string = "This is a strpos() test";
    $pos = strpos($string, "This");
    if ($pos == false) {
        print "Not found\n";
    } else {
        print "Found!\n";
    }

    //you can also search starting from a given index
    $pos = strpos($string, "i", 3);
    print $pos;

    /**
     * strstr() (and case insensitive version, stristr())
     * is a nice and easy function that finds the first occurrence of a substring (parameter two) 
     * inside another string (parameter one), 
     * and returns all characters from the first occurrence to the end of the string. 
     */

    $string = "http://www.example.com/mypage.php";
    $newstring = strstr($string, "www");



    /**
     * Trimming whitespace
     */
    
    $a = trim(" testing ");
    $b = trim(" testing ", " teng");
    $c = ltrim(" testing ");



    /**
    * ASCII conversions
    */

    $mystr = "ASCII is an easy way for computers to work with strings\n";

    //ord() will get the ascii value from a char
    if (ord($mystr{1}) == 83) {
        print "The second letter in the string is S\n";
    } else {
        print "The second letter is not S\n";
    }

    //chr() will output the char for a given numeric ascii value
    $letter = chr(109);

    print "ASCII number 109 is equivalent to $letter\n";

?>