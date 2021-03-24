<?php
    /**
     * __autoload()
     * 
     * This global function is called whenever you try to create an object of a class that hasn't been defined. 
     * 
     * It takes just one parameter, which is the name of the class you have not defined. 
     * If you define an object as being from a class that PHP does not recognise, PHP will run this function, 
     * then try to re-create the object - you have a second chance to have the right class. 
     */

    function __autoload($Class) {
        print "Bad class name: $Class!\n";
        include "barclass.php";
    }

    $foo = new Bar;
    $foo->wombat();

    /**
     * __get()
     * 
     * This is the first of three slightly unusual magic functions, 
     * and allows you to specify what to do if an unknown class variable is read from within your script.
     */

    class dog {
        public $Name;
        public $DogTag;
        // public $Age;

        public function __get($var) {
            print "Attempted to retrieve $var and failed...\n";
        }
    }

    $poppy = new dog;
    print $poppy->Age;

    /**
     * From a practical point of view, this means values can be calculated on the fly
     * without the need to create and use accessor functions - not quite as elegant, perhaps, 
     * but a darn site easier to read and write. 
     */

    /**
     * __set() 
     * 
     * The __set() magic function complements __get(), 
     * in that it is called whenever an undefined class variable is set in your scripts. 
     * This is a little harder to use with good reason, however, and is more likely to confuse than help.
     * 
     * Here is one example of how you could use __set() 
     * to create a very simple database table class and perform ad hoc queries as if they were members of the class 
     */

    class mytable {
        public $Name;

        public function __construct($Name) {
            $this->Name = $Name;
        }

        public function __set($var, $val) {
            GLOBAL $db;
            mysqli_query($db, "UPDATE {$this->Name} SET $var = '$val';");
        }

        // public $AdminEmail = 'foo@bar.com';
    }

    $systemvars = new mytable("systemvars");
    $systemvars->AdminEmail = 'telrev@somesite.net';

    /**
     * In that script $AdminEmail is commented out, and therefore does not exist in the mytable class.
     * As a result, when $AdminEmail is set on the last line, __set() is called, 
     * with the name of the variable being set and the value it is being set to being passed in as
     * parameters one and two respectively. This is used to construct an SQL query in conjunction with the table name
     * passed in through the constructor. While this might seem like an odd way to solve the problem of 
     * setting key database values, it is pretty hard to deny that the last line of code 
     * ($systemvars->AdminEmail...) is actually very easy to read.
     * 
     * This system could be extended to more complicated objects as long as each object knows their own ID number. 
     */



    /**
     * __call()
     * 
     * The call() magic function is to class functions what __get() is to class variables - 
     * if you call meow() on an object of class dog, PHP will fail to find the function and check 
     * whether you have defined a __call() function. If so, your __call() is used, 
     * with the name of the function you tried to call and the parameters you passed 
     * being passed in as parameters one and two respectively. 
     */

    class doggo {
        public $Name;

        public function bark() {
            print "Woof!\n";
        }

        // public function meow() {
            // print "Dogs don't meow!\n";
        // }

        public function __call($function, $args) {
            $args = implode(', ', $args);
            print "Call to $function() with args '$args' failed!\n";
        }
    }

    $poppy = new doggo;
    $poppy->meow("foo", "bar", "baz");

    /**
     * __toString()
     * 
     * The last magic function you need to know about is __toString(), 
     * and allows you to set a string value for the object that will be used if the object is ever used as a string.
     */
?>