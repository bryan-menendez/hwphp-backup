<?php
    /**
     * Chopping and changing arrays
     * 
     * array array_diff ( array array1, array array2 [, array ...])
     * array array_intersect ( array array1, array array2 [, array ...])
     * array array_merge ( array array1, array array2 [, array ...])
     *
     * 
     * 
     * array_diff() returns a new array containing all the values of $arr1 that do not exist in $arr2, 
     * array_intersect() returns a new array containing all the values of $arr1 that do exist in $arr2, and 
     * array_merge() just combines the two arrays.
    */

    $toppings1 = array("Pepperoni", "Cheese", "Anchovies", "Tomatoes");
    $toppings2 = array("Ham", "Cheese", "Peppers");
    $inttoppings = array_intersect($toppings1, $toppings2);
    $difftoppings = array_diff($toppings1, $toppings2);
    $bothtoppings = array_merge($toppings1, $toppings2);
    var_dump($inttoppings);
    var_dump($difftoppings);
    var_dump($bothtoppings);

    /**
     * Stripping out duplicate values
     * 
     * array array_unique ( array input)
     */

    $toppings3 = array("Peppers", "Ham", "Cheese", "Peppers");
    $toppings3 = array_unique($toppings3);
    var_dump($toppings3);




    /**
     * Filtering your array through a function
     * 
     * array array_filter ( array input [, callback function])
     * 
     * The final array function in this group is array_filter(), 
     * which is a very powerful function that allows you to filter elements through a function you specify. 
     * 
     * If the function returns true, the item makes it into the array that is returned, otherwise it is not
     */

    function endswithy($value) {
        return (substr($value, -1) == 'y');
    }

    $people = array("Johnny", "Timmy", "Bobby", "Sam", "Tammy", "Danny", "Joe");
    $withy = array_filter($people, "endswithy");
    var_dump($withy);



    /**
     * Converting an array to individual variables
     * 
     * int extract ( array source [, int extract_type [, string prefix]])
     * 
     * Extract() is a very popular function that converts elements in an array into variables in their own right. 
     * Extract takes a minimum of one parameter, an array, and returns the number of elements extracted
     */

    $Wales = 'Swansea';
    $capitalcities['England'] = 'London';
    $capitalcities['Scotland'] = 'Edinburgh';
    $capitalcities['Wales'] = 'Cardiff';
    extract($capitalcities);
    print $Wales;

    /**
     *  After calling extract, the "England", "Scotland", and "Wales" keys become variables in their own right 
     * ($England, $Scotland, and $Wales), with their values set to "London", "Edinburgh", and "Cardiff" respectively. 
     * By default, extract() will overwrite any existing variables, meaning that 
     * $Wales's original value of "Swansea" will be overwritten with "Cardiff".
     * 
     * This behaviour can be altered using the second parameter, and averted using the third parameter.
     * Read the documentation for more details
     */

    /**
     * Checking whether an element exists
     * 
     * bool in_array ( mixed needle, array haystack [, bool strict])
     * 
     * The in_array() function does precisely what you might think -
     * if you pass it a value and an array it will return true if the value is in the array, otherwise false.
     * You can choose if it will compare in a == or a === fashion by passing parameters
     */

    $needle = "Sam";
    $haystack = array("Johnny", "Timmy", "Bobby", "Sam", "Tammy", "Danny", "Joe");

    if (in_array($needle, $haystack)) {
        print "$needle is in the array!\n";
    } else {
        print "$needle is not in the array\n";
    }


    
    /**
     * Using an array as a double-ended queue
     * 
     * mixed array_shift ( array array)
     * int array_unshift ( array array, mixed var [, mixed ...])
     * int array_push ( array array, mixed var [, mix ...])
     * mixed array_pop ( array array) 
     */

    /**
     * Array_shift() takes an array as its only parameter, 
     * and returns the value from the front of the array while also removing it from the array
     */

    $names = array("Johnny", "Timmy", "Bobby", "Sam", "Tammy", "Danny", "Joe");
    $firstname = array_shift($names);
    var_dump($names);

    /**
     * If you run that script, you will see that $firstname is set to "Johnny", 
     * and the array $names now only has the values Timmy, Bobby, Sam, Tammy, Danny, and Joe - Johnny gets removed. 
     * To remove an element from the end of an array (as opposed to the start), there is also array_pop(), 
     * which works in the same way as array_shift(). Both these functions also have opposites, array_unshift() 
     * and array_push(), which place an element into an array at the start or at the end respectively. 
     */

    $names = array("Johnny", "Timmy", "Bobby", "Sam", "Tammy", "Danny", "Joe");
    
    $firstname = array_shift($names); // First element of $names is now Timmy; last is Joe
    array_push($names, $firstname);// first is Timmy; last is now Johnny
    $firstname = array_pop($names); // first is Timmy; last is Joe again
    array_unshift($names, $firstname); // first is Johnny, last is Joe

    var_dump($names);



    /**
     * Flip an array
     * 
     * array array_flip ( array input)
     * 
     * The array_flip() function takes just one parameter, an array, 
     * and exchanges all the keys in that array with their matching values, returning the new, flipped array. 
     */

    $capitalcities['England'] = 'London'; //now london is the key and england is the value, and so on
    $capitalcities['Scotland'] = 'Edinburgh';
    $capitalcities['Wales'] = 'Cardiff';
    $flippedcities = array_flip($capitalcities);
    var_dump($flippedcities);



    /**
     * Sorting arrays
     * 
     * bool asort ( array input [, int sort_flags])
     * bool ksort ( array input [, int sort_flags])
     * bool arsort ( array input [, int sort_flags])
     * bool krsort ( array input [, int sort_flags])
     * 
     * asort() sorts an array by its values, 
     * whereas ksort() sorts an array by its keys.
     * These two functions also have companions, arsort() and krsort(),
     * which reverse sort the array and reverse sort the array by key respectively.
     * 
     * be wary of the fact that php will always use keys, so sorting an array "without" custom keys
     * will still be treated as an array with keys; therefore, the indexes will be treated as the keys,
     * and sorted accordingly
     * 
     * just read the documentation
     */

    ksort($capitalcities);
    var_dump($capitalcities);
    asort($capitalcities);
    var_dump($capitalcities);



    /**
     * Grabbing keys and values
     * 
     * array array_keys ( array input [, mixed search_value [, bool strict]])
     * array array_values ( array input)
     * 
     * Array_keys() and array_values() are very closely related functions: 
     * the former returns an array of all the keys in an array, 
     * and the latter returns an array of all the values in an array.
     * 
     * you can use it to get the values from an sorted array with jumbled keys, and "re-key" it
     */



    /**
     * Randomising your array
     * 
     * void shuffle ( array input)
     * mixed array_rand ( array input [, int num_req])
     * 
     * Shuffle() takes the entire array and randomises the position of the elements in there. 
     */

    $natural_born_killers = array("lions", "tigers", "bears", "kittens");
    shuffle($natural_born_killers);
    var_dump($natural_born_killers);

    /**
     * One major drawback to using shuffle() is that it mangles your array keys.
     * This is unavoidable sadly, and you need to live with it when you use shuffle()
     */

    /**
     * If you want to pick out just one random value from an array, you can use array_rand() - 
     * it takes an array to read from, then returns one random key from inside there. 
     */



    /**
     * Creating an array of numbers
     * 
     * array range ( int low, int high [, int step])
     */

    $questions = range(1,40);
    $questions = shuffle($questions);

    $questions = range(1, 10, 2); // gives 1, 3, 5, 7, 9
    $questions = range(1, 10, 3); // gives 1, 4, 7, 10
    $questions = range(10, 100, 10);

    $questions = range("a", "z", 1); // gives a, b, c, d, ..., x, y, z
    $questions = range("z", "a", 2);    
?>