<?php
    $name = "Paul";
    print "Your name is $name\n";

    $name2 = $name;
    $age = 20;
    
    //php interprets variables inside the double quotes
    //and ignores everything in singlequotes
    print "Your name is $name2 and your age is $age\n";

    $fruit = "grape";
    print "Also you should make sure the fucking {$fruit}s are ripe.\n"; 
    print "the " .$fruit. "s are ok m8 wtf.\n";
    

    
?>


<?php   
    $foo = 1;
    $bar = 1;
    
    //mixed mode processing allows you not to use print + \n and just prints everything
    if ($foo == $bar) {
?>
    Lots of stuff here
    Lots of stuff here
    Lots of stuff here
    Lots of stuff here
    Lots of stuff here
<?php
    }
?>