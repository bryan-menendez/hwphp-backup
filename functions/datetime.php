<?php
    print time()  . "\n";
    
    //stores the value, not the function
    $foo = time();
    print $foo . "\n";

    $x = 0;
    
    while ($x < 100000000)
       $x++;
    
    //as proven here
    print $foo . "\n";
    
    print "12" + "2" . "\n";
    print "12" . "2" . "\n";
    
    
    /*
     * str to date
     */
    
    print strtotime("22nd December 1979") . "\n";
    print strtotime("22 Dec. 1979 17:30") . "\n";
    print strtotime("1979/12/22") . "\n";
    
    /*
     * a failed conversion will return -1
     */
    
    $mydate = strtotime("Christmas 1979");
    if ($mydate == -1) 
        print "Date conversion failed!" . "\n";
     else 
        print "Date conversion succeeded!" . "\n";
    
    /*
     * strtotime() has an optional second parameter, 
     * which is a timestamp to provide relative dates from.
     */
        
    print strtotime("Next Sunday") . "\n";
    print strtotime("2 days", time() - (86400 * 2)) . "\n"; //today
    print strtotime("1 year ago", 123456789) . "\n"; 
        
    /*
     * date()
     */
    
    print date("H:i") . "\n";
    print "The day yesterday was " . date("l", time() - 86400) . "\n";
    print "The year is " . date("Y") . "\n";
    print date("jS of F Y") . "\n";
    print "My birthday is on a " . date("l", strtotime("22 Dec 2004")) . " this year.\n";
    print date("\M\y b\i\\r\\t\h\d\a\y \i\s o\\n \a l \\t\h\i\s \ye\a\\r. ", strtotime("22 Dec 2004")) . "\n";
    
    /*
     * mktime()
     * just read the documentation i guess
     * int mktime ( [int hour [, int minute [, int second [, int month [, int day [, int year [, int is_dst]]]]]]]) 
     * it can take weird arguments and work with them somehow
     */
    

    
?>