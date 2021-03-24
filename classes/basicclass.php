<?php
    class dog 
    {
        public $name;

        public function bark() {
            print "Woof!\n";
        }
    }

    /**
     * General rules 
     * 
     * 
     * Start or end local variables with a special character so that you are always clear about what variable is being set. 
     * The most common method is to start local variables with an underscore, e.g. _Name, _Age, etc.
     * 
     * To strictly follow OOP guidelines, nearly all of your variables should be either private or protected - 
     * they should not be accessible from outside of an object.
     * 
     * Write accessor functions to set and get private variables. 
     * These functions should be how you interface with the object. 
     * To get a variable called _Age, write a function Age(). To set a variable called _Age, write a function SetAge().
     * 
     * Always put variables and functions as low down in your inheritance as they can go without repetition - 
     * if you find one object has variables and functions it is not supposed to have, you have gone wrong somewhere. 
     * For example, while dolphins can swim, gorillas cannot, so do not put a swim() function 
     * into a mammal class "just to save time".
     * 
     * Always keep in mind Muir's law: 
     * 
     * "When we try to separate anything out by itself, 
     * we find it hitched to everything else in the universe". 
     * 
     * Get your classes distinct and separate from each other to begin with rather than try to hack them apart later on.
     */

    

    /**
     * Inheritance 
    */
    
    class poodle extends dog {
        // nothing new yet
    }


    /**
     * Overrides
     */

    class chowchow extends dog {
        public function bark() {
            print "Yip!\n";
        }

        public function thisbark() {
            print "{$this->name} says Woof!\n";
        }
    }



    /**
     * Instances
     */

    $puppy = new chowchow;
    $puppy->bark();



    /**
     * Variables
     */

    $puppy->name = "LOL";



    /**
     * This
     */

    $puppy->thisname();


    /**
     * Access
     * 
     * Public: This variable or function can be used from anywhere in the script
     * Private: This variable or function can only be used by the object it is part of; it cannot be accessed elsewhere
     * Protected: This variable or function can only be used by the object it is part of, or descendents of that class
     * Final: This variable or function cannot be overridden in inherited classes, or this class cant be inherited by any other
     * Abstract: This function or class cannot be used directly - you must inherit from them first
     */


    /**
     * Output vars
     * 
     * you can use outputVars(); to get printed the variables of an object within scope
     */


    /**
     * Object info
     * 
     * bool is_subclass_of ( mixed object, string class_name)
    */

    if ($poppy instanceof poodle) { }
    if ($poppy instanceof dog) { }

    /**
     * If you only want to know whether an object is a descendant of a class, 
     * and not of that class itself, you can use the is_subclass_of() function. 
     */
?>