<?php
    /**
     * Static data
     * 
     * Put simply, you can declare functions and variables from a class as "static", meaning that they are always available.
     * For example, if we wanted our bark() function to be called as if it were a normal function, 
     * we could declare it static. That way, we could call bark() directly from the script 
     * without the need for any dog objects. This might sound counter-intuitive at first, 
     * but it is actually helpful as it allows you to make use of a particularly helpful function
     *  without needing to instantiate an object first.
     * 
     * You can also make class variables static, 
     * which results in there being only one of that variable for the entire class - 
     * all objects share that one variable. So, if we wanted to have an object for every employee in a business, 
     * we might have a static variable $NextID that holds the next available employee ID number - 
     * when we create a new employee, it takes $NextID for its own $ID, then increments it by one. 
     */

    class employee {
        static public $NextID = 1;
        public $ID;

        public function __construct() {
            $this->ID = self::$NextID++;
        }
    }

    $bob = new employee;
    $jan = new employee;
    $simon = new employee;

    print $bob->ID . "\n";
    print $jan->ID . "\n";
    print $simon->ID . "\n";
    print employee::$NextID . "\n";



    /**
     * Helpful utility functions
     * 
     * bool class_exists ( string class_name)
     * bool get_class ( object object)
     * array get_declared_classes ( void )
     */

    print "Sam is a " . get_class($sam) . "\n";
    print "Class animal exists: " . class_exists("animal") . "\n\n\n\n";
    print "All declared classes are: " . get_declared_classes() . "\n";


    /**
     * Interfaces
     * 
     * array get_declared_interfaces ( void )
     * 
     * If you had a class for boats and a class for planes, how would you implement a boat plane class? 
     * The functions found in the boat class would be helpful to give you code such as sink(), scuttle(), dock(), etc, 
     * and the functions found in the plane() class would be helpful to give you code 
     * such as takeoff(), land(), and bailout(). What is really needed here is 
     * the ability inherit from both the boat class and the plane class, a technique known as multiple inheritance.
     * 
     * Sadly, PHP has no support for multiple inheritance, which means it is a struggle to implement this particular scenario. 
     * If you find yourself in this situation, there are two options: 
     * 
     * use two stages of single inheritance, 
     * or use an entirely new technique of interfacing. 
     * 
     * We will get to the latter option shortly, but first here is how it would look to have two stages of single inheritance: 
     */

    class boat {
        public function sink() { }
        public function scuttle() { }
        public function dock() { }
    }

    class plane extends boat {
        public function takeoff() { }
        public function land() { }
        public function bailout() { }
    }

    class boatplane extends plane {
    }

    $obj = new boatplane();

    /**
     * So, the solution, such as it is, is to use interfaces. 
     * 
     * An interface can be though of as an abstract class 
     * where you can define sets of abstract functions that will be used elsewhere. 
     * 
     * If we were to use interfaces in the above example, both boat and plane would be an interface, 
     * and class boatplane would implement both of these interfaces. 
     * 
     * A class that implements an interface has to have concrete functions 
     * for each of the abstract functions defined in the interface, 
     * so by making a class implement an interface you are in fact saying, 
     * "this class is able to do everything the interface says it should". 
     * In essence, using interfaces is a way to form contracts with your classes - 
     * they must implement functions A, B, and C otherwise they will not work. 
     * 
     *  The above example could be rewritten using interfaces like this: 
     */

    interface boat {
        function sink();
        function scuttle();
        function dock();
    }

    interface plane {
        function takeoff();
        function land();
        function bailout();
    }

    class boatplane implements boat, plane {
        public function sink() { }
        public function scuttle() { }
        public function dock() { }
        public function takeoff() { }
        public function land() { }
        public function bailout() { }
    }

    $obj = new boatplane();

    /**
     * Our boatplane class, by implementing both the boat and plane interfaces, 
     * has essentially promised PHP it will have a function bailout(). 
     * 
     * Therefore, PHP gives it one by default - the bailout() function from the plane interface. 
     * However, as interfaces and their functions are entirely abstract, 
     * and by commenting out that one line we have not re-implemented bailout() in the boatplane class, 
     * the abstract function will be used and thereby make the entire boatplane class abstract.
     */



    /**
     * Deferencing object return values
     * 
     * This is a bit of an odd section - one that doesn't really fit anywhere, but definitely has to go somewhere. 
     * Dereferencing object return values is a fancy way of saying that if you call a function that returns an object,
     * you can treat the return value of that function as an object from the calling line and access it directly.
    */

    $lassie = new dog();
    $collar = $lassie->getCollar();
    echo $collar->Name;

    $poppy = new dog();
    echo $poppy->getCollar()->Name;

    /**
     * In the first example, we need to call getCollar() and save the returned value into $collar, 
     * before echoing out the Name variable of $collar. In the second example, we use the return value from getCollar() 
     * immediately from within the same line of code, and echo out Name without an intermediate variable like $collar.
     */
?>