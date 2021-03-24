<?php
    /**
     * Check if a function exists
     */

    function_exists("funcname");

    /**
     * Check loaded functions
     */

    get_loaded_extensions(); //returns an array
    get_extension_funcs("name"); //returns an array
    dl("name"); //Dynamically Loads a PHP extension at runtime, which means you can enable a certain extension only for a certain script
    extension_loaded("name"); //returns bool

    $extensions = get_loaded_extensions();

    foreach($extensions as $extension) {
        echo $extension;
        echo ' (', implode(', ', get_extension_funcs($extension)), ')<br />';
    }

    /**
     * For example, if you have the wddx extension installed, you should see the following line somewhere in your output:
     * wddx (wddx_serialize_value, wddx_serialize_vars, wddx_packet_start, wddx_packet_end, wddx_add_vars, wddx_deserialize)
     * 
     * Note that the code uses echo rather than print because it uses the comma operator to chain together things to output, 
     * which is more efficient than using the concatenation operator. 
     * 
     * Put simply, the comma operator acts to pass several arguments to echo, 
     * which are output one by one individually. On the other hand, the concatenation operator, 
     * given three strings as in the example above, will combine strings one and two, then the new combined string with string three, 
     * then output the final combined string at once - having to chop and change strings twice is quite slow, and so should be avoided. 
     */

    /**
     * To load an extension at runtime you use the dl() function, 
     * passing in the name of the name of the extension to load its only parameter. 
     * 
     * This is only available when using PHP through the command line. 
     * Note that there are cross-platform considerations to using dl() that are discussed later. 
     * The downside to using dl() is that it needs to literally dynamically load and unload the extension each time your scripts run - 
     * this ends up being a great deal slower than running PHP as a web server module, 
     * where the extensions are loaded just once and kept in memory. 
     */

    dl('php_imap.dll'); // Windows
    dl('imap.so'); // Unix




    /**
     * Pausing script execution
     * 
     *void sleep ( int seconds)
     *void usleep ( int micro_seconds)
     */

    sleep(4);
    echo "Done\n";

    usleep(4000000);
    echo "Done\n";

    /**
     * Note that the default maximum script execution time is 30 seconds, 
     * but you can use sleep() and usleep() to make your scripts go on for longer than that because 
     * technically PHP does not have control during the sleep operation. 
     */



    /**
     * Executing external programs
     * 
     * string exec ( string command [, array output [, int return_var]])
     * void passthru ( string command [, int return_var])
     * int virtual ( string filename)
     */

    /**
     * In PHP there are two important methods to execute programs, and these are exec() and passthru(). 
     * Both of these two take a minimum of one parameter, which is the name of the program you want to run, 
     * but the difference between them is that 
     * 
     * exec() runs the program then sends back the last line 
     * outputted from that program as its return value. 
     * 
     * The passthru() function, on the other hand, 
     * runs the program specified and prints out all the output that program generates. 
     * 
     * Calling exec() is usually preferred when the output of your program is irrelevant, 
     * whereas passthru() automatically prints your output.
     */

    /**
    *  If you pass a second and third parameter to exec(), the output of the command will be put into parameter two as an array 
    * with one line per element, and the return value of the command will be put into parameter three. 
    * Similarly, if you pass a second parameter to passthru() it will be filled with the return value of the command.
    */

    exec("dir", $output, $return);
    echo "Dir returned $return, and output:\n";
    var_dump($output);

    /**
     *  If your server is a Unix box, try using passthru("fortune") to get a quick and easy random quote system for the bottom of your pages. 
     * Note that fortune may not be installed or available to your PHP scripts - contact your system administrator to find out.
     */

    /**
     * Taking user input and passing it to one of these program execution functions is potentially fatal - 
     * users can easily bypass security and do nasty things with your server. 
     * If you really must use user data as input to your program calls, pass it through the special function 
     * 
     * escapeshellcmd() - it takes your input, and returns it in a safe format that can be used. 
     */

    /**
     * There are other execution functions available, notably shell_exec() and system(), 
     * however they are largely irrelevant - shell_exec(), for example, works in exactly the same way as the backtick operator we looked at earlier.
     * there is a third function that allows you to execute externally also, 
     * although it works quite differently from the other two. 
     * 
     * The virtual() function takes just one parameter, and, unusually, only works on Apache and SunONE web servers. 
     * Unlike exec() and system(), virtual() performs a virtual request to the web server for a file, almost as if your script were a client itself. 
     * This request is processed as per usual and its output is sent back to your script.Using this method you can, 
     * for example, execute a Perl script from your PHP script, or, for real weirdness, execute another PHP script from your PHP script.
     */




    /**
     * Connection-related functions
     * 
     * int ignore_user_abort ( [bool setting])
     * void register_shutdown_function ( callback function)
     * int connection_status ( )
     */

    /**
     * Passing true to ignore_user_abort() as its only parameter will instruct PHP that the script is not to be terminated 
     * even if your end-user closes their browser, has navigated away to another site, or has clicked Stop. 
     * This is useful if you have some important processing to do and you do not want to stop it even if your users click cancel, 
     * such as running a payment through on a credit card. You can of course also pass false to ignore_user_abort(), 
     * thereby making PHP exit when the user closes the connection.
     */

    /**
     * For handling shutdown tasks, register_shutdown_function() is perfect, 
     * as it allows you to register with PHP a function to be run when script execution ends
    */

    function say_goodbye() {
        echo "Goodbye!\n";
    }

    register_shutdown_function("say_goodbye");
    echo "Hello!\n";
    //EOF

    /**
     * One very helpful use for shutdown functions is to handle unexpected script termination - i.e. script timeout.
     */

    //register_shutdown_function("say_goodbye");
    set_time_limit(1);
    print "Sleeping...\n";
    sleep(2); //script time limit will be met and execution will stop 
    print "Done!\n"; //this will not execute, but the register_shutdown_function will

    /*
     Of course, the problem with this thinking is that shutdown functions execute irrespective of there having been a timeout or not, 
     therefore it is not wise to set a cleanup function as a shutdown function - 
     it will always execute! However, PHP comes to the rescue with the connection_status() function, 
     which takes no parameters and 
     
     returns 0 if the connection is live and execution is still taking place, 
     1 if the connection is aborted (connection_timeout() will also return true), 
     2 if the connection has been aborted (connection_aborted() will also return true), 
     and 3 if the connection has been aborted and subsequently timed out.

    The last situation is only possible if ignore_user_abort(true) has been used, 
    and the script subsequently timed out. 
    
    Note that the values 0, 1, 2, and 3 evaluate to the constants CONNECTION_NORMAL, CONNECTION_ABORTED, 
    CONNECTION_TIMEOUT, and CONNECTION_ABORTED | CONNECTION_TIMEOUT (a bit-wise OR of the previous two). 
    */



    /**
     * Altering the execution environment
     * 
     * string ini_get ( string varname)
     * string ini_set ( string varname, string newvalue)
     * void set_time_limit ( int seconds)
     */

    /*
    Once a script is running, you still have control over a number of system attributes 
    that affect the way your script is executed. 
    Using the ini_set() function you can temporarily change the execution environment, 
    as if the php.ini file was different. Note that your change is only in effect for the current script, 
    and will revert back when the script ends.

    To use ini_set(), pass it a string for the value you want to change as its first parameter, 
    and the new value to use as its second parameter - if successful it will return the previous value. 
    */

    print ini_set("max_execution_time", "300") . "<br />";
    print ini_set("display_errors", "0") . "<br />";
    print ini_set("include_path", "0") . "<br />";

    /*
    If you want to read a php.ini value without altering it, use ini_get(), 
    which takes the name of the value to read as its only parameter. 
    Note that boolean values returned by ini_get() should be typecasted as integer because 
    otherwise false values will be returned as an empty string. 
    */

    print "Display_errors is turned on: ";
    print (int) ini_get("display_errors");

    /**
     * Note that many numerical values in php.ini are represented using M for megabyte and other shortcuts - 
     * these are preserved in the return value of ini_get(), which means you should not rely on these values to be plain numbers. 
     */

    /**
     * If you find yourself regularly using ini_set, you might find it best just to have multiple .ini files that record your set of changes. In this situation, 
     * try using the php_ini_loaded_file() function to check which configuration is loaded - it returns a string with the .ini filename. 
     */
?>